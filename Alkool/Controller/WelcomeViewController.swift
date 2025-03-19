//
//  WelcomeViewController.swift
//  Alkool
//
//  Created by Ludovic Rocher on 24/01/2025.
//

import UIKit

class WelcomeViewController: UIViewController, UITableViewDataSource, UITableViewDelegate, UITextFieldDelegate {

    @IBOutlet weak var tableView: UITableView!
    @IBOutlet weak var addPlayerButton: UIImageView!
    @IBOutlet weak var playerNameTextField: UITextField!
   
    var players: [Player] = [] {
        didSet {
            savePlayers()
        }
    }
   
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Configure la TableView
        tableView.dataSource = self
        tableView.delegate = self
        
        // Configure le UITextField
        playerNameTextField.delegate = self
        
        // Configure le bouton "+"
        let tapGesture = UITapGestureRecognizer(target: self, action: #selector(addPlayer))
        addPlayerButton.isUserInteractionEnabled = true
        addPlayerButton.addGestureRecognizer(tapGesture)
        
        tableView.backgroundColor = .clear
        tableView.separatorStyle = .none
        
        // Charger les joueurs sauvegardés
        loadPlayers()
    }
    
    func numberOfSections(in tableView: UITableView) -> Int {
        return 1
    }
    
    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return players.count
    }
    
    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        
        let cell = tableView.dequeueReusableCell(withIdentifier: "PlayerCell", for: indexPath)
        
        cell.contentView.subviews.forEach { $0.removeFromSuperview() }

        // Créer une vue conteneur pour le texte et le bouton
        let containerView = UIView()
        containerView.backgroundColor = .clear // Fond transparent
        containerView.layer.borderWidth = 2 // Largeur de la bordure
        containerView.layer.borderColor = UIColor(hex: "#FAEBD7").cgColor // Bordure de la couleur demandée
        containerView.layer.cornerRadius = 10
        containerView.layer.masksToBounds = true
        containerView.translatesAutoresizingMaskIntoConstraints = false
        
        // Créer et ajouter le nom du joueur
        let playerNameLabel = UILabel()
        playerNameLabel.text = players[indexPath.row].name
        playerNameLabel.textColor = UIColor(hex: "#FAEBD7")
        playerNameLabel.textAlignment = .left
        playerNameLabel.font = UIFont.systemFont(ofSize: 24, weight: .bold)
        playerNameLabel.translatesAutoresizingMaskIntoConstraints = false
        containerView.addSubview(playerNameLabel)
        
        // Créer et ajouter le bouton "-"
        let removeButton = UIButton(type: .system)
        removeButton.setTitle("-", for: .normal)
        removeButton.frame = CGRect(x: 0, y: 0, width: 50, height: 50)
        removeButton.titleLabel?.font = UIFont.systemFont(ofSize: 30, weight: .bold)
        removeButton.tag = indexPath.row
        removeButton.addTarget(self, action: #selector(removePlayer(_:)), for: .touchUpInside)
        removeButton.translatesAutoresizingMaskIntoConstraints = false
        containerView.addSubview(removeButton)
        
        // Ajouter le conteneur à la cellule
        cell.contentView.addSubview(containerView)
        
        // Contraintes pour le conteneur (containerView)
        NSLayoutConstraint.activate([
            containerView.leadingAnchor.constraint(equalTo: cell.contentView.leadingAnchor, constant: 10),
            containerView.trailingAnchor.constraint(equalTo: cell.contentView.trailingAnchor, constant: -10),
            containerView.topAnchor.constraint(equalTo: cell.contentView.topAnchor, constant: 10),
            containerView.bottomAnchor.constraint(equalTo: cell.contentView.bottomAnchor, constant: -10)
        ])
        
        // Contraintes pour le nom du joueur (playerNameLabel)
        NSLayoutConstraint.activate([
            playerNameLabel.centerXAnchor.constraint(equalTo: containerView.centerXAnchor),
            playerNameLabel.topAnchor.constraint(equalTo: containerView.topAnchor, constant: 10),
            playerNameLabel.bottomAnchor.constraint(equalTo: containerView.bottomAnchor, constant: -10)
        ])
        
        // Contraintes pour le bouton "-" (removeButton)
        NSLayoutConstraint.activate([
            removeButton.trailingAnchor.constraint(equalTo: containerView.trailingAnchor, constant: -10),
            removeButton.centerYAnchor.constraint(equalTo: containerView.centerYAnchor)
        ])
        
        cell.backgroundColor = .clear
        return cell
    }
    
    @objc func addPlayer() {
        // Vérifie que le champ de texte n'est pas vide
        guard let playerName = playerNameTextField.text, !playerName.isEmpty else {
            return
        }
        
        // Ajoute un nouveau joueur avec le nom entré
        let newPlayer = Player(name: playerName)
        players.insert(newPlayer, at: 0)
        
        // Efface le champ de texte
        playerNameTextField.text = ""
        
        // Recharge la TableView pour afficher le nouveau joueur
        tableView.insertRows(at: [IndexPath(row: 0, section: 0)], with: .automatic)
    }
    
    // Supprimer un joueur
    @objc func removePlayer(_ sender: UIButton) {
        // Utilise le tag du bouton pour récupérer l'index du joueur à supprimer
        let index = sender.tag
        guard index < players.count else { return }
        
        // Supprime le joueur de la liste
        players.remove(at: index)
        
        // Recharge la TableView pour mettre à jour l'affichage
        tableView.deleteRows(at: [IndexPath(row: index, section: 0)], with: .automatic)
        tableView.reloadData()

    }
    
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
        if textField == playerNameTextField {
            addPlayer() // Appelle la méthode pour ajouter un joueur
            textField.resignFirstResponder() // Ferme le clavier
        }
        return true
    }
   
    @IBAction func checkPlayerCount(_ sender: UIButton) {
        if players.count < 2 {
            // Affiche une alerte si le nombre de joueurs est insuffisant
            let alert = UIAlertController(
                title: "Nombre de joueurs insuffisant",
                message: "Vous devez ajouter au moins 2 joueurs pour commencer la partie.",
                preferredStyle: .alert
            )
            alert.addAction(UIAlertAction(title: "OK", style: .default, handler: nil))
            present(alert, animated: true)
        } else {

            // Lance le segue si la condition est remplie
            //performSegue(withIdentifier: "GoSettingsSegue", sender: self)
        }
    }
    
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        if segue.identifier == "GoSettingsSegue" {
            // Assure-toi que le contrôleur cible est bien celui attendu
            if let destinationVC = segue.destination as? SettingsViewController {
                // Passe la liste des joueurs
                destinationVC.players = self.players
            }
        }
    }
    // UserDefaults Helpers
    private func savePlayers() {
        let playerNames = players.map { $0.name }
        UserDefaults.standard.set(playerNames, forKey: "savedPlayers")
    }
    
    private func loadPlayers() {
        if let savedNames = UserDefaults.standard.array(forKey: "savedPlayers") as? [String] {
            players = savedNames.map { Player(name: $0) }
        }
    }
}
