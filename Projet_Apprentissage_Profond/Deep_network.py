# coding: utf8
# !/usr/bin/env python
# ------------------------------------------------------------------------
# Perceptron en pytorch (en utilisant les outils de Pytorch)
# Écrit par Mathieu Lefort
#
# Distribué sous licence BSD.
# ------------------------------------------------------------------------

import gzip, torch
import numpy as np
import torch.nn as nn
import torch.optim as optim

if __name__ == '__main__':
    batch_size = 5  # nombre de données lues à chaque fois
    nb_epochs = 10  # nombre de fois que la base de données sera lue
    eta = 0.002  # taux d'apprentissage
    number_of_hidden_layers = 3  # nombre de couches cachées
    number_of_neurons_per_hidden_layer = [128, 128, 128]  # nombre de neurones pour chaque couche cachée

    # poids initiaux
    w_min = -0.1
    w_max = 0.1
    init_weight_function = "uniform"

    # on lit les données
    ((data_train, label_train), (data_test, label_test)) = torch.load(gzip.open('mnist.pkl.gz'))
    # on crée les lecteurs de données
    train_dataset = torch.utils.data.TensorDataset(data_train, label_train)
    test_dataset = torch.utils.data.TensorDataset(data_test, label_test)
    train_loader = torch.utils.data.DataLoader(train_dataset, batch_size=batch_size, shuffle=True)
    test_loader = torch.utils.data.DataLoader(test_dataset, batch_size=1, shuffle=False)

    # on créer le modèle
    layers = []
    layers.append(nn.Linear(data_train.shape[1], number_of_neurons_per_hidden_layer[0]))
    layers.append(nn.ReLU())
    for index in range(1, number_of_hidden_layers):
        layers.append(nn.Linear(number_of_neurons_per_hidden_layer[index - 1], number_of_neurons_per_hidden_layer[index]))
        layers.append(nn.ReLU())
    layers.append(nn.Linear(number_of_neurons_per_hidden_layer[-1], label_train.shape[1]))
    model = nn.Sequential(*layers)

    # on initialise le modèle et ses poids
    for layer in model:
        if isinstance(layer, nn.Linear):
            torch.nn.init.uniform_(layer.weight, w_min, w_max)
    # on initiliase l'optimiseur
    loss_func = torch.nn.MSELoss(reduction='sum')
    optimizer = torch.optim.SGD(model.parameters(), lr=eta)

    # on entraîne le modèle
    for n in range(nb_epochs):
        for x, t in train_loader:
            y = model(x)
            loss = loss_func(t, y)
            loss.backward()
            optimizer.step()
            optimizer.zero_grad()

        # test du modèle
        acc = 0.
        # on lit toutes les donnéees de test
        for x, t in test_loader:
            # on calcule la sortie du modèle
            y = model(x)
            # on regarde si la sortie est correcte
            acc += torch.argmax(y, 1) == torch.argmax(t, 1)
        # on affiche le pourcentage de bonnes réponses
        print(acc / data_test.shape[0])
