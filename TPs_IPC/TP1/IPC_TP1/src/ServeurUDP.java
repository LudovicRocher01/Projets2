import java.net.*;
import java.util.*;

public class ServeurUDP {
    public static void main(String[] args) {
        try {
            // Création d'un socket UDP sur le port 5000
            DatagramSocket socket = new DatagramSocket(5000);

            // Boucle principale pour écouter les datagrammes entrants
            while (true) {
                // Création d'un datagramme pour stocker les données entrantes
                byte[] buffer = new byte[1024];
                DatagramPacket incoming = new DatagramPacket(buffer, buffer.length);

                // Réception du datagramme entrant
                socket.receive(incoming);

                // Conversion des données en chaîne de caractères
                String message = new String(incoming.getData(), 0, incoming.getLength());

                // Récupération de l'adresse IP et du port du client
                InetAddress clientAddress = incoming.getAddress();
                int clientPort = incoming.getPort();

                // Récupération de l'heure actuelle
                Date date = new Date();
                String response = "Heure actuelle : " + date.toString();

                // Conversion de la réponse en tableau de bytes
                byte[] data = response.getBytes();

                // Création d'un datagramme pour envoyer la réponse au client
                DatagramPacket outgoing = new DatagramPacket(data, data.length, clientAddress, clientPort);

                // Envoi de la réponse
                socket.send(outgoing);
            }
        } catch (Exception e) {
            System.err.println(e);
        }
    }
}


