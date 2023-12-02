# coding: utf8
# !/usr/bin/env python
# ------------------------------------------------------------------------
# Perceptron en pytorch (en utilisant les outils de Pytorch)
# Écrit par Mathieu Lefort
#
# Distribué sous licence BSD.
# ------------------------------------------------------------------------

import gzip, numpy, torch

#On crée un modèle composé de deux couches linéaires (entrée et sortie) et une fonction d'activation
def create_model(input_size, hidden_size, output_size):
	model = torch.nn.Sequential(
		torch.nn.Linear(input_size,hidden_size),
        torch.nn.ReLU(),
		torch.nn.Linear(hidden_size,output_size))
	
	return model
    
if __name__ == '__main__':
	batch_size = 5 # nombre de données lues à chaque fois
	nb_epochs = 10 # nombre de fois que la base de données sera lue
	eta = 0.002 # taux d'apprentissage
	
	hidden_size = 256 # nb neurones de la couche cachée 
	# poids initiaux	
	w_min = - 0.01
	w_max = 0.01
	init_weight_function = "uniform"

	# on lit les données
	((data_train,label_train),(data_test,label_test)) = torch.load(gzip.open('mnist.pkl.gz'))
	# on crée les lecteurs de données
	train_dataset = torch.utils.data.TensorDataset(data_train,label_train)
	test_dataset = torch.utils.data.TensorDataset(data_test,label_test)
	train_loader = torch.utils.data.DataLoader(train_dataset, batch_size=batch_size, shuffle=True)
	test_loader = torch.utils.data.DataLoader(test_dataset, batch_size=1, shuffle=False)

    # on initialise le modèle et ses poids
	model = create_model(data_train.shape[1], hidden_size, label_train.shape[1])
	for layer in model:
		if isinstance(layer, torch.nn.Linear):
			torch.nn.init.uniform_(layer.weight, w_min, w_max)


    # on initialise l'optimiseur
	loss_func = torch.nn.MSELoss(reduction='sum')
	optim = torch.optim.SGD(model.parameters(), lr=eta)

	for n in range(nb_epochs):
		# on lit toutes les données d'apprentissage
		for x,t in train_loader:
			# on calcule la sortie du modèle
			y = model(x)
			# on met à jour les poids
			loss = loss_func(t,y)
			loss.backward()
			optim.step()
			optim.zero_grad()
			
		# test du modèle (on évalue la progression pendant l'apprentissage)
		acc = 0.
		# on lit toutes les données de test
		for x,t in test_loader:
			# on calcule la sortie du modèle
			y = model(x)
			# on regarde si la sortie est correcte
			acc += torch.argmax(y,1) == torch.argmax(t,1)
		# on affiche le pourcentage de bonnes réponses
		print(acc/data_test.shape[0])
