package vue_controleur;
import modele.Direction;
import modele.Jeu;

import javax.swing.*;
import javax.swing.border.Border;

import java.awt.*;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.util.Observable;
import java.util.Observer;

public class Swing2048 extends JFrame implements Observer {

    // SQUARE
    private static final int PIXEL_PER_SQUARE = 80;
    private static final Font CASE_FONT = new Font(Font.DIALOG, Font.BOLD, 30);
    private static final int BORDER_WIDTH = 3;
    // TITLE
    private static final Font TITLE_FONT = new Font(Font.DIALOG, Font.BOLD, 100);
    private static final Font TITLE2_FONT = new Font(Font.DIALOG, Font.BOLD, 30);
    private static final Font FOOTER_FONT = new Font(Font.DIALOG, Font.BOLD, 10);
    // SIDE LABELS
    private static final Font TEXT_FONT = new Font(Font.DIALOG, Font.BOLD, 20);

    // Messages
    private static final String TXT_GAGNE = "Vous avez gagné ! Vous pouvez continuer si vous le souhaitez ou rejouer en appuyant sur R.";
    private static final String TXT_PERDU = "Vous avez perdu... Appuyez sur R pour rejouer.";
    private static final String TXT_TITRE = " 2048";
    private static final String TXT_CREDITS = "Jeu créé par ROCHER Ludovic et VALEMBOIS Auxane";
    private static final String TEXT_CMD_TITLE = "Commandes :";
    private static final String TEXT_CMD_RESTART = "Appuyez sur R pour recommencer";
    private static final String TEXT_CMD_REDIM1 = "Appuyez sur un chiffre";
    private static final String TEXT_CMD_REDIM2 = "entre 3 et 7 pour jouer à";
    private static final String TEXT_CMD_REDIM3 = "un jeu d'une autre dimension";
    private static final String TEXT_CMD_TRICHER = "Appuyez sur T pour tricher";
    private static final String TEXT_CMD_VAL_VICTOIRE = "La valeur victorieuse est : ";
    
    // variables du jeu et du meilleur score
    private Jeu jeu;
    private int best_score;
    
    // tableau de cases : i, j -> case graphique
    private JLabel[][] tabC;

    // labels modifiables
    private JLabel status_label;
    private JLabel win_value_label;
    private JLabel cur_score_label;
    private JLabel best_score_label;
    
    // plateau
    private JPanel board_panel;
    
    public Swing2048(Jeu jeu) {
        this.jeu = jeu;
        this.best_score = 0;

        jeu.addObserver(this);
        
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        
        JPanel panel = new JPanel(new GridBagLayout());
        setContentPane(panel);
        
        GridBagConstraints c = new GridBagConstraints(); 
        c.insets = new Insets(1, 1, 1, 1);
        c.anchor = GridBagConstraints.PAGE_START;
        c.fill = GridBagConstraints.BOTH;

        // ---- Colonne de gauche
        c.gridx=0;
        // 0: Titre
        JLabel label = new JLabel(TXT_TITRE);
        label.setFont(TITLE_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        c.gridy=0;
        c.gridwidth=GridBagConstraints.REMAINDER; // prends toute la largeur
        panel.add(label,c);
        c.gridy=GridBagConstraints.RELATIVE;
        // 1: Status
        status_label = new JLabel();
        status_label.setFont(TEXT_FONT);
        status_label.setVisible(false);
        status_label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(status_label,c);
        c.gridwidth=1;
        // 2: Titre commandes
        label = new JLabel(TEXT_CMD_TITLE);
        label.setFont(TITLE2_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        c.gridy=2;
        panel.add(label,c);
        c.gridy=GridBagConstraints.RELATIVE;
        // 3: Cmd restart
        label = new JLabel(TEXT_CMD_RESTART);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 4: Cmd Redim1
        label = new JLabel(TEXT_CMD_REDIM1);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 5: Cmd Redim2
        label = new JLabel(TEXT_CMD_REDIM2);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 6: Cmd Redim3
        label = new JLabel(TEXT_CMD_REDIM3);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 7: Label valeur victoire
        label = new JLabel(TEXT_CMD_VAL_VICTOIRE);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 8: Valeur victoire
        win_value_label = new JLabel(String.valueOf(jeu.getWinValue()));
        win_value_label.setFont(TEXT_FONT);
        win_value_label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(win_value_label,c);
        // 9: Cmd tricher
        label = new JLabel(TEXT_CMD_TRICHER);
        label.setForeground(Color.LIGHT_GRAY);
        label.setFont(TEXT_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 10: Credits
        label = new JLabel(TXT_CREDITS);
        label.setFont(FOOTER_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        c.gridwidth=GridBagConstraints.REMAINDER; // prends toute la largeur
        panel.add(label,c);
        c.gridwidth=1;

        // ----- Colonne du milieu
        c.gridx=1;
        
        // 2-8: Plateau de jeu 
        board_panel = new JPanel();
        c.gridy = 2;
        c.gridheight=8;
        panel.add(board_panel,c);
        c.gridheight = 1;
                
        // ---- Colonne de droite
        c.gridx=3;
        // 0-1: Titres
        // 2: Titre score courant
        label = new JLabel("Score courant : ");
        label.setFont(TITLE2_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        c.gridy=2;
        panel.add(label,c);
        c.gridy=GridBagConstraints.RELATIVE;

        // 3: Score courant
        cur_score_label = new JLabel(String.valueOf(0));
        cur_score_label.setFont(TEXT_FONT);
        cur_score_label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(cur_score_label,c);
        // 4: Titre meilleur score 
        label = new JLabel("Meilleur score : ");
        label.setFont(TITLE2_FONT);
        label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(label,c);
        // 5: Titre meilleur score 
        best_score_label = new JLabel(String.valueOf(0));
        best_score_label.setFont(TEXT_FONT);
        best_score_label.setHorizontalAlignment(SwingConstants.CENTER);
        panel.add(best_score_label,c);

        rebuildBoard();

        ajouterEcouteurClavier();
        rafraichir();

    }

    private void rebuildBoard() {

        int boardWidth = jeu.getSize() * PIXEL_PER_SQUARE + (jeu.getSize()-1) * BORDER_WIDTH;
        Dimension boardDimension = new Dimension(boardWidth, boardWidth);
        board_panel.setPreferredSize(boardDimension);
        board_panel.setMaximumSize(boardDimension);
        board_panel.setMinimumSize(boardDimension);
        Dimension windowDimension = new Dimension(
            getContentPane().getPreferredSize().width + 30,
            getContentPane().getPreferredSize().height + 80
        );
        setMinimumSize(windowDimension);
        setSize(windowDimension);

        board_panel.removeAll();
        board_panel.setLayout(new GridLayout(jeu.getSize(), jeu.getSize()));

        tabC = new JLabel[jeu.getSize()][jeu.getSize()];
        for (int v = 0; v < jeu.getSize(); v++) {
            for (int h = 0; h < jeu.getSize(); h++) {
                
                Border border = BorderFactory.createLineBorder(Color.darkGray, BORDER_WIDTH);
                tabC[h][v] = new JLabel();
                tabC[h][v].setBounds(0,0,PIXEL_PER_SQUARE,PIXEL_PER_SQUARE);
                tabC[h][v].setBorder(border);
                tabC[h][v].setHorizontalAlignment(SwingConstants.CENTER);
                tabC[h][v].setFont(CASE_FONT);
                
                board_panel.add(tabC[h][v]);
            }
        }
    }
    
    private void restart(int size) {
        if (null != jeu && size == jeu.getSize()) {
            jeu.restart();
            return;
        }

        jeu = new Jeu(size);

        jeu.addObserver(this);
        SwingUtilities.invokeLater(new Runnable() { // demande au processus graphique de réaliser le traitement
            @Override
            public void run() {
                rebuildBoard();
                rafraichir();
            }
        });

    }

    /**
     * Correspond à la fonctionnalité de Vue : affiche les données du modèle
     */
    private void rafraichir()  {

        SwingUtilities.invokeLater(new Runnable() { // demande au processus graphique de réaliser le traitement
            @Override
            public void run() {
                for (int h = 0; h < jeu.getSize(); h++) {
                    for (int v = 0; v < jeu.getSize(); v++) {
                        
                        int val = jeu.getCaseValue(h, v);

                        if (0 == val) {
                            tabC[h][v].setText("");
                            tabC[h][v].setOpaque(false);
                        } else {
                            tabC[h][v].setText(Integer.toString(val));
                            tabC[h][v].setOpaque(true);
                        }

                        switch (val) {
                            case 0:
                                tabC[h][v].setForeground(Color.WHITE);
                                tabC[h][v].setBackground(Color.WHITE);
                                break;
                            case 2:
                                tabC[h][v].setBackground(Color.decode("#F7DCF9"));
                                tabC[h][v].setForeground(Color.BLACK);
                                break;
                            case 4:
                                tabC[h][v].setBackground(Color.decode("#EFB8F5"));
                                tabC[h][v].setForeground(Color.BLACK);
                                break;
                            case 8:
                                tabC[h][v].setBackground(Color.decode("#E795EE"));
                                tabC[h][v].setForeground(Color.BLACK);
                                break;
                            case 16:
                                tabC[h][v].setBackground(Color.decode("#DF72E9"));
                                tabC[h][v].setForeground(Color.BLACK);
                                break;
                            case 32:
                                tabC[h][v].setBackground(Color.decode("#D74FE3"));
                                tabC[h][v].setForeground(Color.BLACK);
                                break;
                            case 64:
                                tabC[h][v].setBackground(Color.decode("#B61FC1"));
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                            case 128:
                                tabC[h][v].setBackground(Color.decode("#931A9E"));
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                            case 256:
                                tabC[h][v].setBackground(Color.decode("#73157A"));
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                            case 512:
                                tabC[h][v].setBackground(Color.decode("#510F57"));
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                            case 1024:
                                tabC[h][v].setBackground(Color.decode("#310935"));
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                            default:
                                tabC[h][v].setForeground(Color.BLACK);
                                tabC[h][v].setForeground(Color.WHITE);
                                break;
                        }
                        win_value_label.setText(String.valueOf(jeu.getWinValue()));
                    }
                    cur_score_label.setText(String.valueOf(jeu.getScore()));
                    if (best_score < jeu.getScore()) {
                        best_score = jeu.getScore();
                        best_score_label.setText(String.valueOf(best_score));
                    }
                    if (jeu.isWin()) {
                        status_label.setText(TXT_GAGNE);
                        status_label.setForeground(Color.GREEN);
                        status_label.setVisible(true);
                    } else if (jeu.isFailed()) {
                        status_label.setText(TXT_PERDU);
                        status_label.setForeground(Color.RED);
                        status_label.setVisible(true);
                    } else {
                        status_label.setVisible(false);
                    }
                }
            }
        });

    }

    /**
     * Correspond à la fonctionnalité de Contrôleur : écoute les évènements, et déclenche des traitements sur le modèle
     */
    private void ajouterEcouteurClavier() {
        addKeyListener(new KeyAdapter() { // new KeyAdapter() { ... } est une instance de classe anonyme, il s'agit d'un objet qui correspond au controleur dans MVC
            @Override
            public void keyPressed(KeyEvent e) {
                switch(e.getKeyCode()) {  // on regarde quelle touche a été pressée
                    case KeyEvent.VK_LEFT : jeu.play(Direction.gauche); break;
                    case KeyEvent.VK_RIGHT : jeu.play(Direction.droite); break;
                    case KeyEvent.VK_DOWN : jeu.play(Direction.bas); break;
                    case KeyEvent.VK_UP : jeu.play(Direction.haut); break;
                    case KeyEvent.VK_R : jeu.restart(); break;
                    case KeyEvent.VK_3 : restart(3); break;
                    case KeyEvent.VK_4 : restart(4); break;
                    case KeyEvent.VK_5 : restart(5); break;
                    case KeyEvent.VK_6 : restart(6); break;
                    case KeyEvent.VK_7 : restart(7); break;
                    case KeyEvent.VK_8 : restart(8); break;
                    case KeyEvent.VK_9 : restart(9); break;
                    case KeyEvent.VK_T : jeu.lowerWinValue(); break;
                }
            }
        });
    }

    @Override
    public void update(Observable o, Object arg) {
        rafraichir();
    }
}