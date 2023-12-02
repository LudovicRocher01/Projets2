using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


namespace Sudoku
{
    public partial class FSudoku : Form
    {

        private TextBox[] union1;
        private TextBox[] union2;
        private TextBox[] union3;
        private TextBox[] union4;
        private TextBox[] union5;
        private TextBox[] union6;
        private TextBox[] union7;
        private TextBox[] union8;
        private TextBox[] union9;
        private TextBox[][] unions;
        

        private TextBox[] ligne1;
        private TextBox[] ligne2;
        private TextBox[] ligne3;
        private TextBox[] ligne4;
        private TextBox[] ligne5;
        private TextBox[] ligne6;
        private TextBox[] ligne7;
        private TextBox[] ligne8;
        private TextBox[] ligne9;
        private TextBox[][] lignes;


        private TextBox[] colonne1;
        private TextBox[] colonne2;
        private TextBox[] colonne3;
        private TextBox[] colonne4;
        private TextBox[] colonne5;
        private TextBox[] colonne6; 
        private TextBox[] colonne7;
        private TextBox[] colonne8;
        private TextBox[] colonne9;
        private TextBox[][] colonnes;

        private string[][] solutions;

        public FSudoku()
        {
            InitializeComponent();
            this.union1 = new TextBox[9] { tB11, tB12, tB13, tB21, tB22, tB23, tB31, tB32, tB33 };
            this.union2 = new TextBox[9] { tB14, tB15, tB16, tB24, tB25, tB26, tB34, tB35, tB36};
            this.union3 = new TextBox[9] { tB17, tB18, tB19, tB27, tB28, tB29, tB37, tB38, tB39};
            this.union4 = new TextBox[9] { tB41, tB42, tB43, tB51, tB52, tB53, tB61, tB62, tB63};
            this.union5 = new TextBox[9] { tB44, tB45, tB46, tB54, tB55, tB56, tB64, tB65, tB66};
            this.union6 = new TextBox[9] { tB47, tB48, tB49, tB57, tB58, tB59, tB67, tB68, tB69};
            this.union7 = new TextBox[9] { tB71, tB72, tB73, tB81, tB82, tB83, tB91, tB92, tB93};
            this.union8 = new TextBox[9] { tB74, tB75, tB76, tB84, tB85, tB86, tB94, tB95, tB96};
            this.union9 = new TextBox[9] { tB77, tB78, tB79, tB87, tB88, tB89, tB97, tB98, tB99};
            this.ligne1 = new TextBox[9] { tB11, tB12, tB13, tB14, tB15, tB16, tB17, tB18, tB19};
            this.ligne2 = new TextBox[9] { tB21, tB22, tB23, tB24, tB25, tB26, tB27, tB28, tB29 };
            this.ligne3 = new TextBox[9] { tB31, tB32, tB33, tB34, tB35, tB36, tB37, tB38, tB39 };
            this.ligne4 = new TextBox[9] { tB41, tB42, tB43, tB44, tB45, tB46, tB47, tB48, tB49 };
            this.ligne5 = new TextBox[9] { tB51, tB52, tB53, tB54, tB55, tB56, tB57, tB58, tB59 };
            this.ligne6 = new TextBox[9] { tB61, tB62, tB63, tB64, tB65, tB66, tB67, tB68, tB69 };
            this.ligne7 = new TextBox[9] { tB71, tB72, tB73, tB74, tB75, tB76, tB77, tB78, tB79 };
            this.ligne8 = new TextBox[9] { tB81, tB82, tB83, tB84, tB85, tB86, tB87, tB88, tB89 };
            this.ligne9 = new TextBox[9] { tB91, tB92, tB93, tB94, tB95, tB96, tB97, tB98, tB99 };
            this.colonne1 = new TextBox[9] { tB11, tB21, tB31, tB41, tB51, tB61, tB71, tB81, tB91 };
            this.colonne2 = new TextBox[9] { tB12, tB22, tB32, tB42, tB52, tB62, tB72, tB82, tB92 };
            this.colonne3 = new TextBox[9] { tB13, tB23, tB33, tB43, tB53, tB63, tB73, tB83, tB93 };
            this.colonne4 = new TextBox[9] { tB14, tB24, tB34, tB44, tB54, tB64, tB74, tB84, tB94 };
            this.colonne5 = new TextBox[9] { tB15, tB25, tB35, tB45, tB55, tB65, tB75, tB85, tB95 };
            this.colonne6 = new TextBox[9] { tB16, tB26, tB36, tB46, tB56, tB66, tB76, tB86, tB96 };
            this.colonne7 = new TextBox[9] { tB17, tB27, tB37, tB47, tB57, tB67, tB77, tB87, tB97 };
            this.colonne8 = new TextBox[9] { tB18, tB28, tB38, tB48, tB58, tB68, tB78, tB88, tB98 };
            this.colonne9 = new TextBox[9] { tB19, tB29, tB39, tB49, tB59, tB69, tB79, tB89, tB99 };
            this.colonnes = new TextBox[9][] { this.colonne1, this.colonne2, this.colonne3, this.colonne4, this.colonne5, this.colonne6, this.colonne7, this.colonne8, this.colonne9 }; //initialisation du tableau de colonnes
            this.lignes = new TextBox[9][] { this.ligne1, this.ligne2, this.ligne3, this.ligne4, this.ligne5, this.ligne6, this.ligne7, this.ligne8, this.ligne9 }; // initialisation du tableau de lignes
            this.unions = new TextBox[9][] { this.union1, this.union2, this.union3, this.union4, this.union5, this.union6, this.union7, this.union8, this.union9 }; // initialisation du tableau de régions
            Color[] couleurs = new Color[9] { Color.Yellow, Color.Gold, Color.RosyBrown, Color.Orange, Color.White, Color.Cyan, Color.Pink, Color.Lime, Color.Beige }; //choix des couleurs pour les régions
            for(var i = 0; i<9; i++)
            {
                for(var j = 0; j<9; j++)
                {
                    this.unions[i][j].BackColor = couleurs[i];  // application des couleurs aux régions
                }
            }
            this.solutions = new string[9][];
            for(var i = 0; i < 9; i++)
            {
                this.solutions[i] = new string[9];
            }
            cB1.SelectedIndex = 0; // selection de la difficulté facile par defaut
        }
        
        /// <summary>
        /// Créé une grille de sudoku parfaite
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void creationSudoku(object sender, EventArgs e)
        {
            remise0();
            Int32 rdm, tmp, n;
            Int16 essai = 0; // compteur du nombre d'erreur sur une ligne
            Boolean done;
            List<Int32> valeurs = new List<int> { 1, 2, 3, 4, 5, 6, 7, 8, 9 };
            Random aleatoire = new Random();
            for (var i = 0; i < 9; i++)
            {
                for (var j = 0; j < 9; j++) // parcour toutes las cases de la grille
                {
                    done = false;
                    while (!done)
                    {
                        n = 0; // compteur du nombre d'echec dans la recherche dans chiffre qui correspond à la grille
                        while ((!done) && (n < 100))
                        {
                            rdm = aleatoire.Next(valeurs.Count);
                            tmp = valeurs[rdm]; // selection d'un chiffre aléatoire
                            if ((occurenceLigne(i, tmp) == 0) && (occurenceColonnes(j, tmp) == 0) && (occurenceUnion(i, j, tmp) == 0)) // detection d'erreur si le chiffre selectionné correspond à la grille
                            {
                                this.lignes[i][j].Text = tmp.ToString(); // application du chiffre sur la grille
                                done = true;
                            }
                            else
                            {
                                n++;
                            }
                        }
                        if (essai >= 100) // regarde si il y a eu beaucoup d'essai de création de la ligne
                        {
                            break; // fin de la tentative de création de la grille
                        }
                        if (n >= 100) // regarde si il y a eu plus de 100 tentative pour trouver un chiffre qui correspond
                        {
                            for (var k = 0; k < 9; k++) // parcour la ligne
                            {
                                this.lignes[i][k].Text = ""; // reinitilalise la toutes les cases de la ligne à vide
                                essai++;
                            }
                            j = 0;
                        }
                    } if(essai >= 100)
                    {
                        break;
                    }
                }
                if(essai >= 100)
                {
                    break;
                }
            }
            if (essai >= 100)
            {
                creationSudoku(sender, e); // lancement d'une nouvelle grille
            }
            else
            {
                for (var x = 0; x < 9; x++)
                {
                    for (var y = 0; y < 9; y++) // parcour la grille
                    {
                        this.solutions[y][x] = this.lignes[y][x].Text; // création du la grille de solution
                    }
                }
                difficulté(cB1.SelectedIndex); // mise en place de la difficulté
            }
        }

        /// <summary>
        /// Réinitialise la grille entierement pour avoir une grille vierge
        /// </summary>
        private void remise0()
        {
            for(var x = 0; x < 9; x++)
            {
                for(var y = 0; y < 9; y++)  // parcour de la grille
                {
                    this.lignes[x][y].Text = ""; // enlève les chiffres
                    this.lignes[x][y].Enabled = true; // devérouille les cases
                    this.solutions[x][y] = ""; // reinitilaisation de la grille de solution
                }
            }
        }

        /// <summary>
        /// Efface un certain nombre de valeur de la grille pour en avoir un nombre défini en fonction de la difficulté
        /// </summary>
        /// <param name="x">definit la difficulté 0 : facile
        ///                                       1 : moyen
        ///                                       2 :difficile
        ///                                       </param>
        private void difficulté(int x)
        {
            int n, l, c;
            Boolean done;
            Random aleatoire = new Random();
            int[] difficulte = new int[3] { 34, 31, 28 }; // le nombre de chiffres à conserver en fonction de la difficulté
            n = difficulte[x]; // selection du nombre de cases qui seront préservées
            while(n < 81)
            {
                done = false;
                while (!done)
                {
                    c = aleatoire.Next(9); // selection d'une colonne aléatoire
                    l = aleatoire.Next(9); // selection d'une ligne aléatoire
                    if(this.lignes[l][c].Text != "") // regarde si la case contient un chiffre
                    {
                        this.lignes[l][c].Text = ""; // enlève une case aléatoire
                        done = true;
                    }
                }
                n++;
            }
            for(var i = 0; i < 9; i++)
            {
                for(var j = 0; j < 9; j++) // parcour toute la grille 
                {
                    if(this.lignes[i][j].Text != "") // regarde si la case contient un chiffre
                    {
                        this.lignes[i][j].Enabled = false; // verrouille les cases restantes avec des chiffres pour empécher le joueur de les éffacer
                    }
                }
            }
        }
        
        /// <summary>
        /// Dévoile la solution d'une case aléatoire du Sudoku
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void aide(object sender, EventArgs e)
        {
            int l, c;
            Boolean done = false;
            Random aleatoire = new Random();
            while (!done)
            {
                c = aleatoire.Next(9); // choix d'une colonne aléatoire
                l = aleatoire.Next(9); // choix d'une ligne aléatoire
                if (this.lignes[l][c].Enabled == true) // regarde si la case peut être modifier par le joueur
                {
                    this.lignes[l][c].Text = this.solutions[l][c]; // révélation d'une case aléatoire
                    this.lignes[l][c].Enabled = false;
                    done = true;
                }
            }
        }

        /// <summary>
        /// Reinitialise la partie en enlevant toutes les valeurs entré par le joueur et en gardant les valeurs de base ainsi que les aides.
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void Renitialiser(object sender, EventArgs e)
        {
            for(var x = 0; x < 9; x++)
            {
                for(var y = 0; y < 9; y++) // parcour toutes la grille
                {
                    if(this.lignes[x][y].Enabled == true) // regarde si la case est modifiable par le joueur
                    {
                        this.lignes[x][y].Text = ""; // efface le chiffre de la case si c'eatit un chiffre entré par le joueur
                    }
                }
            }
        }

        /// <summary>
        /// Verifie toutes les valeurs du sudoku et mais toutes erreurs en rouge si la checkBox est cochée sinon mets toutes les valeurs en noir
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void Verification(object sender, EventArgs e)
        {
            Int16 count = 0; // nombre de chiffres trouvés
            if(checkBox1.Checked == true)
            {
                int nbr;
                for (var x = 0; x < 9; x++)
                {
                    for (var y = 0; y < 9; y++) // parcour toute la grille
                    {
                        count++;
                        if (this.lignes[x][y].Enabled == true) // regarde si c'est une case modifiable par le joueur
                        {
                            if (this.lignes[x][y].Text != "") // regarde si la case contient un chiffre
                            {
                                nbr = Int32.Parse(lignes[x][y].Text);
                                if ((occurenceLigne(x, nbr) > 1) || (occurenceColonnes(y, nbr) > 1) || (occurenceUnion(x, y, nbr) > 1)) // regarde si le chiffre peut correspondre à la grille
                                {
                                    this.lignes[x][y].ForeColor = Color.Red; // coloration du chiffre en rouge si erreur 
                                    count--;
                                }
                                else
                                {
                                    this.lignes[x][y].ForeColor = Color.Black; // coloration du chiffre en noir car pas d'erreur
                                }
                            }
                            else
                            {
                                count--;
                            }
                        }
                    }
                }
                if (count == 81)
                {
                    message.Text = "Bravo! Vous avez résolu le sudoku";
                }
                else
                {
                    message.Text = "Il vous manque " + (81 - count).ToString() + " chiffres à trouver";

                }
            }
            else
            {
                for (var x = 0; x < 9; x++)
                {
                    for (var y = 0; y < 9; y++) // parcour toute la grille
                    {
                        count++;
                        if (this.lignes[x][y].Enabled == true) // regarde si c'est une case modifiable par le joueur
                        {
                            if (this.lignes[x][y].Text != "") // regarde si la case contient un chiffre
                            {
                                this.lignes[x][y].ForeColor = Color.Black; // coloration de tous les chiffres en noir car pas de verification auto
                            }
                            else
                            {
                                count--;
                            }
                        }
                    }
                }
                message.Text = "Il vous manque " + (81 - count).ToString() + " chiffres à trouver, pensez à activer la verification";
            }
        }

        /// <summary>
        /// Donne le nombre de fois ou nbr apparait sur la ligne
        /// </summary>
        /// <param name="y">Le numérode la ligne</param>
        /// <param name="nbr">Le nombre cherché</param>
        /// <returns></returns>
        private Int16 occurenceLigne(int y, int nbr)
        {
            Int16 occ = 0;
            for(var i = 0; i < 9; i++)
            {
                if(this.lignes[y][i].Text == nbr.ToString()) // regarde si la case à le même chiffre que celui cherché
                {
                    occ++;
                }
            }
            return occ;
        }

        /// <summary>
        /// Donne le nombre de fois ou nbr apparait sur la colonne
        /// </summary>
        /// <param name="x">Donne le numéro de la colonne</param>
        /// <param name="nbr">Le nombre cherché</param>
        /// <returns></returns>
        private Int16 occurenceColonnes(int x, int nbr)
        {
            Int16 occ = 0;
            for (var i = 0; i < 9; i++) // parcour de la colonne
            {
                if (this.colonnes[x][i].Text == nbr.ToString()) // regarde si la case à le même chiffre que celui cherché
                {
                    occ++;
                }
            }
            return occ;
        }

        /// <summary>
        /// Donne le nombre de fois ou nbr apparait dans la région
        /// </summary>
        /// <param name="x">numéro de la ligne de la case</param>
        /// <param name="y">numéro de la colonne de la case</param>
        /// <param name="nbr">Le nombre cherché</param>
        /// <returns></returns>
        private Int16 occurenceUnion(int x, int y, int nbr)
        {
            Int16 occ = 0;
            TextBox[] union;
            for (var u = 0; u < 9; u++) // parcour toutes les régions à la recherche de celle contenant la case chercher
            {
                if(Array.Exists(this.unions[u], element => element == this.lignes[x][y])) // recherche de l'union correspond à la case cherché
                {
                    union = this.unions[u];
                    for (var i = 0; i < 9; i++) //parcour la région
                    {
                        if (union[i].Text == nbr.ToString()) // regarde si la case à le même chiffre que celui cherché
                        {
                            occ++;
                        }
                    }
                }
            }
            return occ;
        }
    }
}
