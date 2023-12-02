package src;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);
        System.out.print("Entrez la taille du taquin : ");
        int taille = scanner.nextInt();

        int[][] initial = TaquinSolver.generateRandomState(taille);
        //int[][] initial = {{15, 6, 1, 13}, {10, 11, 3, 5}, {8, 4, 14, 2}, {7, 9, 12, 0}};


        System.out.println("État initial :");
        TaquinSolver.printState(initial);
        System.out.println();

        TaquinSolver solver = new TaquinSolver();

        long debut = System.currentTimeMillis(); // Temps de début

        solver.solve(initial, taille);

        long fin = System.currentTimeMillis(); // Temps de fin
        long tempsEcoule = fin - debut;


        System.out.println("Temps écoulé : " + tempsEcoule + " millisecondes.");

    }
}
