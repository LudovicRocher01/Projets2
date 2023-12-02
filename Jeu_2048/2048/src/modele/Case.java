package modele;

public class Case {
    public static final Case HORS_PLATEAU = null;

    private boolean locked;
    private int valeur;
    private Jeu jeu;

    public Case(Jeu jeu, int valeur) {
        this.jeu = jeu;
        this.valeur = valeur;
        this.locked = false;
    }

    public int getValeur() {
        return this.valeur;
    }

    public boolean isLocked() {
        return this.locked;
    }

    protected void setUnlocked() {
        this.locked = false;
    }

    public boolean canMove(Direction d) {
        if (0 == valeur) {
            return false;
        }

        Case n = jeu.getNeighbor(this, d);
        if (Case.HORS_PLATEAU == n) {
            return false;
        }

        if (0 == n.valeur || valeur == n.valeur) {
            return true;
        }

        return false;
    }

    // retourne vrai si le mouvement a été effectué
    public boolean move(Direction d) {
        if (0 == valeur) {
            return false;
        }

        Case n = jeu.getNeighbor(this, d);
        if (Case.HORS_PLATEAU == n) {
            return false;
        }

        if (0 == n.valeur) {
            jeu.move(this, d);
            return true;
        }
        if (!n.locked && ! locked && n.valeur == valeur) {
            valeur += n.valeur;
            jeu.increaseScore(valeur);
            jeu.move(this, d);
            locked = true;
            return true;
        }

        return false;
    }

}
