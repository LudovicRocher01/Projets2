import java.io.IOException;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.SocketException;

public class Communication extends Thread{
    private DatagramPacket dp;
    int id;
    public static int idClient = 1;
    boolean reception;

    public Communication(DatagramPacket packet){
        this.id = idClient;
        this.dp = packet;
        idClient++;
        reception = true;
    }

    public void run() {

        try {

            DatagramSocket ds = new DatagramSocket();
            System.out.println("[Ligne" + id + "] créée sur le port " + ds.getPort());
            while(true){
                if(!reception) {
                    byte[] stockage = new byte[8192];
                    dp = new DatagramPacket(stockage, stockage.length);
                    ds.receive(dp);
                    dp.setLength(stockage.length);
                }
                reception = false;
                String msg = new String(dp.getData());
                System.out.print("[Ligne" + id + "] paquet reçu de " + dp.getAddress()
                        + " sur le port " + dp.getPort() + " : ");
                System.out.println(msg);
                byte[] stockage2 = new String("Réponse test "+ id).getBytes();
                //byte[] stockage2 = new String("Réponse du serveur à " + msg).getBytes();
                DatagramPacket dp2 = new DatagramPacket(stockage2, stockage2.length, dp.getAddress(), dp.getPort());
                ds.send(dp2);
                dp2.setLength(stockage2.length);

            }

        } catch (SocketException e) {
            throw new RuntimeException(e);
        } catch (IOException e) {
            throw new RuntimeException(e);
        }
    }

}