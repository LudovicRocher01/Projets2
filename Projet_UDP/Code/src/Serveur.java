import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.SocketException;

public class Serveur {


    public static void main(String[] args){
        try {
            // Connexion
            DatagramSocket ds = new DatagramSocket(2345);

            // Lancement du serveur
            System.out.println("Serveur démarré");
            while(true){

                // Réception d'une requête
                byte[] stockage = new byte[8192];
                DatagramPacket dp = new DatagramPacket(stockage, stockage.length);
                ds.receive(dp);
                dp.setLength(stockage.length);

                String msg = new String(dp.getData()).split(" ")[0];
                System.out.print("Paquet reçu de " + dp.getAddress()
                        + " sur le port " + dp.getPort() + " : ");
                System.out.println(msg);
                System.out.println("Mise en service d'une ligne privée");
                new Communication(dp).start();



                // Traitement
                /*dp.setLength(stockage.length);

                String msg = new String(dp.getData()).split(" ")[0];
                System.out.print("Paquet reçu de " + packet.getAddress()
                        + " sur le port " + packet.getPort() + " : ");
                System.out.println(msg);

                // Envoi de la réponse
                byte[] stockage2 = new String("Nouvel Essai").getBytes();
                //byte[] stockage2 = new String("Réponse du serveur à " + msg).getBytes();
                DatagramPacket dp2 = new DatagramPacket(stockage2, stockage2.length, dp.getAddress(), dp.getPort());
                server.send(dp2);
                dp2.setLength(stockage2.length);
                */
            }
        } catch (SocketException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
};


