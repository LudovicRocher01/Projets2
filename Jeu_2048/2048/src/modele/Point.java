package modele;

public class Point {
    private int h;
    private int v;

    public Point(int h, int v) {
        this.h = h;
        this.v = v;
    }
    
    public int getH() {
        return this.h;
    }

    public int getV() {
        return this.v;
    }

    @Override
    public boolean equals(Object o) {
        if (o == this) {
            return true;
        }
 
        if (!(o instanceof Point)) {
            return false;
        }
         
        Point p = (Point)o;
        return (p.h == h) && (p.v == v);
    }
    
}
