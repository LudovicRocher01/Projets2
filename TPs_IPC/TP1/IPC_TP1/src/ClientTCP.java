import java.net.*;
import java.io.*;

public class ClientTCP {
    public static void main(String[] args) throws IOException {
        Socket socket = null;
        BufferedReader in = null;

        try {
            socket = new Socket("localhost", 6000);
            in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            System.out.println("Heure actuelle : " + in.readLine());
        } catch (UnknownHostException e) {
            System.err.println("Hôte inconnu : " + e);
        } catch (IOException e) {
            System.err.println("Erreur de connexion : " + e);
        }

        in.close();
        socket.close();
    }
}