import java.net.*;
import java.util.*;

import java.net.DatagramSocket;

public class Client {

    private static final int clientPort = 1031;

    public static void main(String[] args) {
        try {
            DatagramSocket socket = new DatagramSocket(1031);
            String message = "Bonjour à toi, comment vas-tu ?";
            byte[] data = message.getBytes();
            InetAddress serverAddress = InetAddress.getByName("localhost");

            int serverPort = 1030;
            DatagramPacket outgoing = new DatagramPacket(data, data.length, serverAddress, serverPort);
            socket.send(outgoing);

            byte[] buffer = new byte[1024];
            DatagramPacket packet = new DatagramPacket(buffer, buffer.length);
            socket.receive(packet);

            String response = new String(packet.getData(), 0, packet.getLength());

            System.out.println(response);

            socket.close();

        }
        catch (Exception e) {
            System.err.println(e);
        }
    }
}
