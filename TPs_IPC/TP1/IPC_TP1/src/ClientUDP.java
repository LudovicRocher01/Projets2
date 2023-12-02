import java.net.*;

public class ClientUDP {
    public static void main(String[] args) {
        try {
            // Création d'un socket UDP
            DatagramSocket socket = new DatagramSocket();

            // Envoi d'un datagramme au serveur
            String message = "Quelle heure est-il ?";
            byte[] data = message.getBytes();
            InetAddress serverAddress = InetAddress.getByName("localhost");
            int serverPort = 5000;
            DatagramPacket outgoing = new DatagramPacket(data, data.length, serverAddress, serverPort);
            socket.send(outgoing);

            // Réception de la réponse du serveur
            byte[] buffer = new byte[1024];
            DatagramPacket incoming = new DatagramPacket(buffer, buffer.length);
            socket.receive(incoming);

            // Conversion des données en chaîne de caractères
            String response = new String(incoming.getData(), 0, incoming.getLength());

            // Affichage de la réponse
            System.out.println(response);

            // Fermeture du socket
            socket.close();
        } catch (Exception e) {
            System.err.println(e);
        }
    }
}
