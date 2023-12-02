package src;

import java.util.Arrays;

public class State {
    // Cette classe représente un état du jeu et les méthodes définies permettent de récupérer les informations de cet état
    private int[][] state;
    private int cost;
    private int heuristic;
    private int priority;
    private State parent;

    public State(int[][] state, int cost, State parent) {
        this.state = state;
        this.cost = cost;
        this.parent = parent;
        this.heuristic = 0;
        this.priority = cost + heuristic;
    }

    public int[][] getState() {
        return state;
    }

    public int getCost() {
        return cost;
    }

    public void setCost(int cost) {
        this.cost = cost;
    }


    public int getPriority() {
        return priority;
    }

    public void setPriority(int priority) {
        this.priority = priority;
    }

    public State getParent() {
        return parent;
    }

    public void setParent(State parent) {
        this.parent = parent;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        State state1 = (State) o;
        return Arrays.deepEquals(state, state1.state);
    }

    @Override
    public int hashCode() {
        return Arrays.deepHashCode(state);
    }
    
}
