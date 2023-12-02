import java.io.*;
import java.net.*;

public class ClientTCP2 {
    public static void main(String[] args) throws IOException {
        Socket socket = new Socket("localhost", 1234);

        BufferedInputStream in = new BufferedInputStream(socket.getInputStream());
        ByteArrayOutputStream buffer = new ByteArrayOutputStream();
        int bytesRead;
        byte[] data = new byte[1024];

        while ((bytesRead = in.read(data, 0, data.length)) != -1) {
            buffer.write(data, 0, bytesRead);
        }

        System.out.println("La date est : " + buffer.toString());
        socket.close();
    }
}
