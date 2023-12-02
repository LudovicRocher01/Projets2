package vue_controleur;



import modele.Direction;
import modele.Jeu;

import java.io.IOException;
import java.util.Observable;
import java.util.Observer;

public class Console2048 extends Thread implements Observer {

    private Jeu jeu;



    public Console2048(Jeu _jeu) {
        jeu = _jeu;

    }


    @Override
    public void run() {
        while(true) {
            afficher();

            synchronized (this) {
                ecouteEvennementClavier();
                try {
                    wait(); // lorsque le processus s'endort, le verrou sur this est relâché, ce qui permet au processus de ecouteEvennementClavier()
                    // d'entrer dans la partie synchronisée, ce verrou évite que le réveil du processus de la console (update(..)) ne soit exécuté avant
                    // que le processus de la console ne soit endormi

                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        }

    }

    /**
     * Correspond à la fonctionnalité de Contrôleur : écoute les évènements, et déclenche des traitements sur le modèle
     */
    private void ecouteEvennementClavier() {

        final Object _this = this;

        new Thread() {
            public void run() {

                synchronized (_this) {
                    boolean end = false;

                    while (!end) {
                        String s = null;
                        try {
                            s = Character.toString((char)System.in.read());
                        } catch (IOException e) {
                            e.printStackTrace();
                        }

                        switch (s) {
                            case "4":
                                jeu.play(Direction.gauche);
                                // end = jeu.isOver();
                                break;
                            case "8":
                                jeu.play(Direction.haut);
                                // end = jeu.isOver();
                                break;
                            case "6":
                                jeu.play(Direction.droite);
                                // end = jeu.isOver();
                                break;
                            case "2":
                                jeu.play(Direction.bas);
                                // end = jeu.isOver();
                                break;
                        }
                    }


                }

            }
        }.start();


    }

    /**
     * Correspond à la fonctionnalité de Vue : affiche les données du modèle
     */
    private void afficher()  {


        System.out.printf("\033[H\033[J"); // permet d'effacer la console (ne fonctionne pas toujours depuis la console de l'IDE)

        for (int i = 0; i < jeu.getSize(); i++) {
            for (int j = 0; j < jeu.getSize(); j++) {
                int v = jeu.getCaseValue(i, j);
                if (0 != v) {
                    System.out.format("%5.5s", v);
                } else {
                    System.out.format("%5.5s", "");
                }

            }
            System.out.println();
        }

    }

    private void raffraichir() {
        synchronized (this) {
            try {
                notify();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }


    @Override
    public void update(Observable o, Object arg) {
        raffraichir();
    }
}
