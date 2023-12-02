package modele;

import java.util.HashMap;
import java.util.Observable;
import java.util.Random;

public class Jeu extends Observable {
    public static final int DEFAULT_WIN_VALUE = 2048;

    protected Case[][] tabCases;
    protected HashMap<Case, Point> positionCase;
    protected boolean gagne;
    protected boolean perdu;
    private int win_value;
    private int score;
    private Random rnd = new Random();

    public Jeu(int size) {
        this.tabCases = new Case[size][size];
        this.positionCase = new HashMap<Case, Point>(size*size);
        this.restart();
    }    

    public int getSize() {
        return this.tabCases.length;
    }
    
    public int getCaseValue(int h, int v) {
        return tabCases[h][v].getValeur();
    }
    
    public int getCaseValue(Point p) {
        return tabCases[p.getH()][p.getV()].getValeur();
    }
    
    protected Case getNeighbor(Case c, Direction d) {
        Point p = this.positionCase.get(c);
        int h = p.getH();
        int v = p.getV();
        switch (d) {
            case gauche:
                if (h-1 < 0) return Case.HORS_PLATEAU;
                return this.tabCases[h-1][v];
            case droite:
                if (h+1 > this.tabCases.length-1) return Case.HORS_PLATEAU;
                return this.tabCases[h+1][v];
            case haut:
                if (v-1 < 0) return Case.HORS_PLATEAU;
                return this.tabCases[h][v-1];
            case bas:
                if (v+1 > this.tabCases.length-1) return Case.HORS_PLATEAU;
                return this.tabCases[h][v+1];
        }
        // Ne devrait jamais être atteint
        return Case.HORS_PLATEAU;
    }

    public boolean isWin() {
        return this.gagne;
    }

    public boolean isFailed() {
        return this.perdu;
    }

    public int getScore() {
        return this.score;
    }

    protected void increaseScore(int n) {
        this.score += n;
    }

    private int newRandValue() {
        return rnd.nextInt(2)*2 + 2;
    }

    public void restart() {
        Jeu jeu = this;

        new Thread() { // permet de libérer le processus graphique ou de la console
            public void run() {
                gagne = false;
                perdu = false;
                score = 0;
                positionCase.clear();
                win_value = Jeu.DEFAULT_WIN_VALUE;
                int nbCaseVide = tabCases.length*tabCases.length;
                int pos1 = rnd.nextInt(nbCaseVide);
                int pos2 = rnd.nextInt(nbCaseVide-1);
                if (pos1 <= pos2) {
                    pos2++;
                }
                Case c1 = new Case(jeu, newRandValue());
                Case c2;
                if (4 == c1.getValeur()) {
                    c2 = new Case(jeu, 2);
                } else {
                    c2 = new Case(jeu, newRandValue());
                }
                
                for (int h=0 ; h<tabCases.length ; h++) {
                    for (int v=0 ; v<tabCases.length ; v++) {
                        if (0 == pos1) {
                            tabCases[h][v] = c1;
                            positionCase.put(c1, new Point(h, v));
                        } else if (0 == pos2) {
                            tabCases[h][v] = c2;
                            positionCase.put(c2, new Point(h, v));
                        } else {
                            tabCases[h][v] = new Case(jeu, 0);
                            positionCase.put(tabCases[h][v], new Point(h, v));
                        }
                        pos1--;
                        pos2--;
                    }    
                }

                setChanged();
                notifyObservers();
            }

        }.start();
    }


    // renvoi vrai si le jeu est terminé
    public void play(Direction d) {
        
        if (this.isFailed()) {
            return;
        }

        new Thread() { // permet de libérer le processus graphique ou de la console

            public void run() {
                int h,v;
                Case c;
                for (h = 0; h < tabCases.length; h++) {
                    for (v = 0; v < tabCases.length; v++) {
                        tabCases[h][v].setUnlocked();
                    }
                }
                boolean hasMoved = false;
                switch (d) {
                    case haut:
                        for (h = 0 ; h < tabCases.length ; h++) {
                            for (v = 1 ; v < tabCases.length ; v++) {
                                c = tabCases[h][v];
                                while (c.move(d)) {
                                    hasMoved = true;
                                }
                            }
                        }
                        break;

                    case bas:
                        for (h = 0 ; h < tabCases.length ; h++) {
                            for (v = tabCases.length-1 ; v >= 0 ; v--) {
                                c = tabCases[h][v];
                                while (c.move(d)) {
                                    hasMoved = true;
                                }
                            }
                        }
                        break;
                        
                    case droite:
                        for (v = 0 ; v < tabCases.length ; v++) {
                            for (h = tabCases.length-1 ; h >= 0 ; h--) {
                                c = tabCases[h][v];
                                while (c.move(d)) {
                                    hasMoved = true;
                                }
                            }
                        }
                        break;
                        
                    case gauche:
                        for (v = 0 ; v < tabCases.length ; v++) {
                            for (h = 1 ; h < tabCases.length ; h++) {
                                c = tabCases[h][v];
                                while (c.move(d)) {
                                    hasMoved = true;
                                }
                            }
                        }
                        break;
                        
                }

                if (hasMoved) {
                    addRndValue();
                    checkFailed();
                    checkWin();
                }

                setChanged();
                notifyObservers();

            }

        }.start();

    }

    private void addRndValue() {
        int nbCaseVide = 0;
        for (int h = 0; h < tabCases.length ; h++) {
            for (int v = 0; v < tabCases.length; v++) {
                if (0 == tabCases[h][v].getValeur()) {
                    nbCaseVide++;
                }
            }
        }
        if (0 == nbCaseVide) { return ; }
        int pos = rnd.nextInt(nbCaseVide);
        for (int h = 0; h < tabCases.length ; h++) {
            for (int v = 0; v < tabCases.length; v++) {
                if (0 == tabCases[h][v].getValeur() && 0 == pos--) {
                    tabCases[h][v] = new Case(this, newRandValue());
                    positionCase.put(tabCases[h][v], new Point(h, v));
                    return;
                }
            }
        }
    }
    
    public void lowerWinValue(){
        if (win_value > 2) {
            win_value = win_value/2;
            checkWin();
            setChanged();
            notifyObservers();
        } 
    }

    public int getWinValue(){
        return win_value;
    }

    private void checkWin() {
        for (int h = 0; h < tabCases.length; h++) {
            for (int v = 0; v < tabCases.length; v++) {
                gagne |= tabCases[h][v].getValeur() >= win_value;
                if (gagne) return;
            }
        }
    }

    private void checkFailed() {
        if (perdu) return;
        for (int h = 0; h < tabCases.length; h++) {
            for (int v = 0; v < tabCases.length; v++) {
                Case c = tabCases[h][v];
                if (null == c) return;
                if (c.canMove(Direction.bas)) return;
                if (c.canMove(Direction.haut)) return;
                if (c.canMove(Direction.gauche)) return;
                if (c.canMove(Direction.droite)) return;
            }
        }
        perdu = true;
    }

    // déplace la case dans la direction donnée et met une case vide à l'emplacement initial
    public void move(Case c, Direction d) {
        if (null == c) {
            return;
        }
        
        Case n = getNeighbor(c, d);
        if (Case.HORS_PLATEAU == n) {
            return;
        }

        Point pos_initiale = positionCase.get(c);
        Point pos_nouvelle = positionCase.get(n);
        
        // remplace la case de destination par la case
        tabCases[pos_nouvelle.getH()][pos_nouvelle.getV()] = c;
        positionCase.remove(n);
        positionCase.put(c, pos_nouvelle);

        // met une case vide à l'emplacement initial
        n = new Case(this, 0);
        tabCases[pos_initiale.getH()][pos_initiale.getV()] = n;
        positionCase.put(n, pos_initiale);
    }

}
