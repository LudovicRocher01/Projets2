package src;

import java.util.*;

public class TaquinSolver {
    private static final int[][] MOVES = {{0, 1}, {1, 0}, {0, -1}, {-1, 0}}; // Droite, Bas, Gauche, Haut


    static int[][] generateRandomState(int taille) {
        List<Integer> numbers = new ArrayList<>();
        for (int i = 0; i < (taille * taille); i++) {
            numbers.add(i);
        }
        Collections.shuffle(numbers);

        int[][] state = new int[taille][taille];
        int index = 0;
        for (int i = 0; i < taille; i++) {
            for (int j = 0; j < taille; j++) {
                state[i][j] = numbers.get(index++);
            }

        }

        return state;
    }



    public void solve(int[][] initial, int taille) {

        long debut = System.currentTimeMillis(); // Temps de début


        int[][] OBJECTIF = generateGoalState(taille);

        // État initial
        State initialState = new State(initial, 0, null);
        initialState.setPriority(calculateHeuristic(initialState.getState()));

        // On initialise l'ensemble des états à explorer
        PriorityQueue<State> openSet = new PriorityQueue<>(Comparator.comparingInt(State::getPriority));
        openSet.add(initialState);

        // On stocke les états déjà explorés
        HashMap<State, Boolean> exploredStates = new HashMap<>();
        exploredStates.put(initialState, true);

        // Recherche de solution
        while (!openSet.isEmpty()) {

            long tempsActuel = System.currentTimeMillis(); // Temps de fin

            long tempsEcoule = tempsActuel - debut;

            if (tempsEcoule > 15000) {
                System.out.println("Temps écoulé, pas de solution");
                return;
            }


            // On récupère l'état courant avec la priorité la plus faible
            State current = openSet.poll();


            // On vérifie si on a trouvé la solution
            if (isGoalState(current.getState(), OBJECTIF)) {
                List<int[][]> path = new ArrayList<>();
                int c = current.getCost();
                while (current != null) {
                    path.add(0, current.getState());
                    current = current.getParent();
                }
                System.out.println("Solution trouvée en " + c + " coups :");
                for (int[][] state : path) {
                    printState(state);
                    System.out.println();
                }
                return;
            }


            // On génère les états voisins possibles à partir de l'état courant puis on les parcoure
            List<State> neighbors = generateNeighbors(current, taille);
            for (State neighbor : neighbors) {
                if (exploredStates.containsKey(neighbor))
                    continue;

                int cost = current.getCost() + 1;
                neighbor.setCost(cost);
                neighbor.setPriority(cost + calculateHeuristic(neighbor.getState()));
                neighbor.setParent(current);
                openSet.add(neighbor);
                exploredStates.put(neighbor, true);
            }
        }

        // Dans le cas où il n'y pas de solution possible
        System.out.println("Aucune solution trouvée.");
    }

    // Génération des états voisins possibles à partir de l'état actuel
    private List<State> generateNeighbors(State state, int taille) {
        List<State> neighbors = new ArrayList<>();
        int[][] currentState = state.getState();

        int emptyRow = 0;
        int emptyCol = 0;
        boolean foundEmpty = false;

        // On recherche la position de la case vide
        for (int row = 0; row < taille; row++) {
            for (int col = 0; col < taille; col++) {
                if (currentState[row][col] == 0) {
                    emptyRow = row;
                    emptyCol = col;
                    foundEmpty = true;
                    break;
                }
            }
            if (foundEmpty) {
                break;
            }
        }

        // Génération des voisins en effectuant les mouvements possibles
        for (int[] move : MOVES) {
            int newRow = emptyRow + move[0];
            int newCol = emptyCol + move[1];

            if (isValidMove(newRow, newCol, taille)) {
                int[][] newState = new int[taille][taille];
                for (int i = 0; i < taille; i++) {
                    for (int j = 0; j < taille; j++) {
                        newState[i][j] = currentState[i][j];
                    }
                }
                newState[emptyRow][emptyCol] = newState[newRow][newCol];
                newState[newRow][newCol] = 0;
                neighbors.add(new State(newState, state.getCost() + 1, state));
            }
        }

        return neighbors;
    }

    private int[][] generateGoalState(int taille) {
        int[][] goalState = new int[taille][taille];
        int value = 1;
        for (int i = 0; i < taille; i++) {
            for (int j = 0; j < taille; j++) {
                goalState[i][j] = value;
                value++;
            }
        }
        goalState[taille - 1][taille - 1] = 0; // La dernière case est vide
        return goalState;
    }
    private boolean isValidMove(int row, int col, int taille) {
        return row >= 0 && row < taille && col >= 0 && col < taille;
    }

    private boolean isGoalState(int[][] state, int[][] goalState) {
        return Arrays.deepEquals(state, goalState);
    }

    // heuristique en utilisant la distance de Manhattan
    private int calculateHeuristic(int[][] state) {
        int heuristic = 0;
        int taille = state.length;

        for (int row = 0; row < taille; row++) {
            for (int col = 0; col < taille; col++) {
                int value = state[row][col];
                if (value != 0) {
                    int expectedRow = (value - 1) / taille;
                    int expectedCol = (value - 1) % taille;
                    heuristic += Math.abs(row - expectedRow) + Math.abs(col - expectedCol);
                }
            }
        }

        return heuristic;
    }


    // Afichage d'une grille

    static void printState(int[][] state) {
        int taille = state.length;

        for (int row = 0; row < taille; row++) {
            for (int col = 0; col < taille; col++) {
                System.out.print(state[row][col] + " ");
            }
            System.out.println();
        }
    }

}
