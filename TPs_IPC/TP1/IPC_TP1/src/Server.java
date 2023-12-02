import java.net.*;
import java.util.*;

import java.net.DatagramSocket;

public class Server {

    private static final int serverPort = 1030;

    public static void main(String[] args) {
        try {
            DatagramSocket socket = new DatagramSocket(1030);
            byte[] buffer = new byte[1024];
            DatagramPacket packet = new DatagramPacket(buffer, buffer.length);

            socket.receive(packet);
            String message = new String(packet.getData(), 0, packet.getLength());
            InetAddress clientAddress = packet.getAddress();
            int clientPort = packet.getPort();

            String response = "Bonjour, je vais bien.";
            byte[] data = response.getBytes();
            DatagramPacket packet1 = new DatagramPacket(data, data.length, clientAddress, clientPort);
            socket.send(packet1);

        }
        catch (Exception e) {
            System.err.println(e);
        }
    }
}
