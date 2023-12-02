import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;
import java.net.SocketException;
import java.net.UnknownHostException;


public class Client {
    static long lag = 1000;

    public static void main(String[] args) throws Exception {

        // Demande d'id du client
        System.out.print("Veuillez entrer une id de client : ");
        BufferedReader buffR = new BufferedReader(
                new InputStreamReader( System.in ));
        String nomClient = buffR.readLine();
        byte[] buffer = nomClient.getBytes();
        int port = 2345;
        boolean reception = true;

        // Envoi et réception de messages permanents
        while(true){
            try {
                // On donne un indice au client
                DatagramSocket client = new DatagramSocket();

                // Envoi de la requête
                InetAddress adresseServeur = InetAddress.getByName("127.0.0.1");
                DatagramPacket dp = new DatagramPacket(buffer, buffer.length, adresseServeur, port);
                dp.setData(buffer);

                client.send(dp);

                // Réception de la réponse
                byte[] stockage = new byte[8000];
                DatagramPacket dp2 = new DatagramPacket(stockage, stockage.length, adresseServeur, port);
                client.receive(dp2);
                if(reception) {
                    port = dp2.getPort();
                }
                reception = false;
                // affichage
                System.out.println(port);
                System.out.print(nomClient + " réponse reçue : ");
                System.out.println(new String(dp2.getData()));


                byte[] stockage2 = new String("Message test").getBytes();
                DatagramPacket dp3 = new DatagramPacket(stockage2, stockage2.length, adresseServeur, port);

                try {
                    Thread.sleep(lag);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                client.close();
            } catch (SocketException e) {
                e.printStackTrace();
            } catch (UnknownHostException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}


