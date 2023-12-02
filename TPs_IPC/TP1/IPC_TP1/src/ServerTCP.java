import java.net.*;
import java.io.*;

public class ServerTCP {
    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = null;
        try {
            serverSocket = new ServerSocket(6000);
        } catch (IOException e) {
            System.err.println("Erreur création du socket serveur : " + e);
        }

        Socket clientSocket = null;
        try {
            clientSocket = serverSocket.accept();
        } catch (IOException e) {
            System.err.println("Erreur de connexion : " + e);
        }

        PrintWriter out = new PrintWriter(clientSocket.getOutputStream(), true);
        out.println(new java.util.Date().toString());

        out.close();
        clientSocket.close();
        serverSocket.close();
    }
}