import java.io.*;
import java.net.*;

public class ServerTCP2 {
    public static void main(String[] args) throws IOException {
        ServerSocket serverSocket = new ServerSocket(1234);

        while (true) {
            Socket clientSocket = serverSocket.accept();

            BufferedOutputStream out = new BufferedOutputStream(clientSocket.getOutputStream());
            out.write(getCurrentTime().getBytes());
            out.flush();

            clientSocket.close();
        }
    }

    private static String getCurrentTime() {
        return new java.util.Date().toString();
    }
}