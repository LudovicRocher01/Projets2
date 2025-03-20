//
//  GameViewController.swift
//  Alkool
//
//  Created by Ludovic Rocher on 26/01/2025.
//

import UIKit

class GameViewController: UIViewController {
    @IBOutlet weak var progressBar: UIProgressView!
    @IBOutlet weak var messageLabel: UILabel!
    @IBOutlet weak var themeLabel: UILabel!
    @IBOutlet weak var sipLabel: UILabel!
    @IBOutlet weak var revealButton: UIButton!
    @IBOutlet weak var infoButton: UIButton!
    @IBOutlet weak var infoView: UIView!
    @IBOutlet weak var closeInfoButton: UIButton!
    
    var players: [Player] = []
    var totalQuestions: Int = 25
    var selectedThemes: [String] = []
    var availableThemeTypes = [Int]()

    private var currentQuestionIndex: Int = 1
    private var currentAnswer: String = ""


    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        availableThemeTypes = getAvailableThemeTypes()
        updateProgressBar()
        generateNewChallenge()
    }
    
    func getAvailableThemeTypes() -> [Int] {
        var themeList = [Int]()
        
        if selectedThemes.contains("Catégorie") {
            themeList += [0, 1, 2, 21, 22]
        }
        if selectedThemes.contains("Autres") {
            themeList += [12,13,14,15,18,29]
        }
        if selectedThemes.contains("Je n'ai jamais") {
            themeList += [6,7,8]
        }
        if selectedThemes.contains("Qui pourrait") {
            themeList += [9,10,11]
        }
        if selectedThemes.contains("Jeux") {
            themeList += [3,4,5,16,17]
        }
        if selectedThemes.contains("Débats") {
            themeList += [19,20]
        }
        if selectedThemes.contains("Culture G") {
            themeList += [23,24,25]
        }
        if selectedThemes.contains("Vrai ou Faux") {
            themeList += [26,27,28]
        }

        return themeList
    }

    
    func goToMainMenu() {
        if let navigationController = self.navigationController {
            navigationController.popToRootViewController(animated: true)
        } else {
            self.view.window?.rootViewController?.dismiss(animated: true)
        }
    }
    
    @IBAction func dismiss(_ sender: Any) {
        let alert = UIAlertController(
            title: "Quitter la partie",
            message: "Êtes-vous sûr de vouloir quitter la partie ?",
            preferredStyle: .alert
        )
        
        let confirmAction = UIAlertAction(title: "Oui", style: .destructive) { _ in
            self.goToMainMenu()
        }
        alert.addAction(confirmAction)
        
        let cancelAction = UIAlertAction(title: "Non", style: .cancel, handler: nil)
        alert.addAction(cancelAction)
        
        present(alert, animated: true)
    }
    
    @IBAction func showInfo(_ sender: UIButton) {
        infoView.isHidden = false
        themeLabel.isHidden = true
        messageLabel.isHidden = true
        sipLabel.isHidden = true
        infoButton.isHidden = true
    }
    
    @IBAction func hideInfo(_ sender: UIButton) {
        infoView.isHidden = true
        themeLabel.isHidden = false
        messageLabel.isHidden = false
        sipLabel.isHidden = false
        infoButton.isHidden = false
    }
    
    @IBAction func nextChallenge(_ sender: UIButton) {
        checkEndGame()
        if currentQuestionIndex < totalQuestions {
            currentQuestionIndex += 1
            updateProgressBar()
            generateNewChallenge()
        }
    }
    
    func generateNewChallenge() {
        guard !availableThemeTypes.isEmpty else {
                messageLabel.text = "Aucun thème sélectionné"
                themeLabel.text = ""
                sipLabel.text = ""
                return
            }
        
        let randomPlayer = players.randomElement()!
        let themeType = availableThemeTypes.randomElement()!
        
        let message: String
        var secondPlayer: Player? = nil
        
        revealButton.isHidden = true
        currentAnswer = ""
        
        switch themeType {
        case 0...2:
            let randomCategory = GameData.categories.randomElement()!
            themeLabel.text = "Catégorie 📂"
            sipLabel.text = "10 🥃 max"
            message = "\(randomPlayer.name), cite autant \(randomCategory) que tu peux. Pour chaque bonne réponse, tu distribue une gorgée. Si tu te trompes, c'est toi qui bois"
        case 3...5:
            let randomChallenge = GameData.challenges.randomElement()!
            themeLabel.text = "Défi 🎯"
            sipLabel.text = "🥃🥃🥃 en cas de refus"
            message = "\(randomPlayer.name), \(randomChallenge)"
        case 6...8:
            let randomIHaveNever = GameData.NeverHave.randomElement()!
            themeLabel.text = "Je n'ai jamais 🙈"
            sipLabel.text = "🥃🥃"
            message = "\(randomIHaveNever)"
        case 9...11:
            let randomWho = GameData.Who.randomElement()!
            themeLabel.text = "Qui pourrait 🤔"
            sipLabel.text = "🥃🥃"
            message = "\(randomWho) ?"
        case 12...13:
            let randomOneUnluck = GameData.OneUnluck.randomElement()!
            themeLabel.text="Action 🎬"
            sipLabel.text="🥃?"
            message = "\(randomPlayer.name), \(randomOneUnluck)"
        case 14...15:
            let randomUnluck = GameData.Unluck.randomElement()!
            themeLabel.text="Action Groupe 🤹"
            sipLabel.text="🥃?"
            message = "\(randomUnluck)"
        case 16:
            secondPlayer = players.randomElement()
            while secondPlayer?.name == randomPlayer.name {
                secondPlayer = players.randomElement()
            }
            let randomVersus = GameData.Versus.randomElement()!
            themeLabel.text = "Versus ⚔️"
            sipLabel.text = "🥃🥃🥃"
            message = "\(randomPlayer.name) et \(secondPlayer?.name ?? "un autre joueur") : \(randomVersus)"
        case 17:
            let randomGame = GameData.Game.randomElement()!
            themeLabel.text = "Jeu 🎲"
            sipLabel.text = "🥃🥃🥃"
            message = "\(randomGame). \(randomPlayer.name) à toi l'honneur"
        case 18:
            let randomMalediction = GameData.Malediction.randomElement()!
            themeLabel.text = "Malédiction ☠️"
            sipLabel.text = "🥃 par erreur"
            message = "\(randomPlayer.name), jusqu'à la fin de la partie : \(randomMalediction)"
        case 19...20:
            let randomDebate = GameData.Debate.randomElement()!
            themeLabel.text = "Débat 🗣️"
            sipLabel.text = "🥃🥃"
            message = "\(randomDebate)"
        case 21...22:
            let randomRoundCategorie = GameData.RoundCategories.randomElement()!
            themeLabel.text = "Catégorie 🗂️"
            sipLabel.text = "🥃🥃"
            message = "Chacun son tour, citez \(randomRoundCategorie), celui qui se trompe ou prend trop de temps perd. \(randomPlayer.name) commence"
        case 23...25:
            let randomCulture = GameData.Culture.randomElement()!
            themeLabel.text = "Culture G 📚"
            sipLabel.text = "🥃🥃"

            let parts = randomCulture.split(separator: "(")
            message = "\(randomPlayer.name), \( parts[0].trimmingCharacters(in: .whitespaces))"
            if parts.count > 1 {
                currentAnswer = parts[1].replacingOccurrences(of: ")", with: "")
            }
            revealButton.isHidden = false
            
        case 26...28:
            let randomTrueOrFalse = GameData.TrueOrFalse.randomElement()!
            themeLabel.text = "Vrai ou Faux ✅"
            sipLabel.text = "🥃🥃"
            
            let parts = randomTrueOrFalse.split(separator: "(")
            message = "\(randomPlayer.name), \( parts[0].trimmingCharacters(in: .whitespaces))"
            if parts.count > 1 {
                currentAnswer = parts[1].replacingOccurrences(of: ")", with: "")
            }
            revealButton.isHidden = false
        case 29:
            secondPlayer = players.randomElement()
            while secondPlayer?.name == randomPlayer.name {
                secondPlayer = players.randomElement()
            }
            let randomConfidence = GameData.Confidence.randomElement()!
            themeLabel.text = "Confidences 🕵️"
            sipLabel.text = "🥃🥃"
            message = "\(randomPlayer.name), concernant \(secondPlayer?.name ?? "un autre joueur") : \(randomConfidence)"
        default:
            message = " \(availableThemeTypes)"
        }
        
        let attributedMessage = NSMutableAttributedString(string: message)
        
        if let playerNameRange = message.range(of: randomPlayer.name) {
            let nsRange = NSRange(playerNameRange, in: message)
            attributedMessage.addAttribute(.font, value: UIFont.boldSystemFont(ofSize: 25.0), range: nsRange)
        }
        
        if let secondPlayerName = secondPlayer?.name, let secondPlayerNameRange = message.range(of: secondPlayerName) {
            let nsRange = NSRange(secondPlayerNameRange, in: message)
            attributedMessage.addAttribute(.font, value: UIFont.boldSystemFont(ofSize: 25.0), range: nsRange)
        }
        
        messageLabel.attributedText = attributedMessage
    }
    
    func updateProgressBar() {
        let progress = Float(currentQuestionIndex) / Float(totalQuestions)
        progressBar.setProgress(progress, animated: true)
    }
    
    @IBAction func revealAnswer(_ sender: UIButton) {
        messageLabel.text = "\(currentAnswer)"
        revealButton.isHidden = true
    }
    
    func checkEndGame() {
        if currentQuestionIndex >= totalQuestions {
            let alert = UIAlertController(
                title: "Fin de la partie",
                message: "Toutes les questions ont été posées !",
                preferredStyle: .alert
            )
            
            let backToMenuAction = UIAlertAction(title: "Retour au menu principal", style: .default) { _ in
                self.goToMainMenu()
            }
            alert.addAction(backToMenuAction)
            
            present(alert, animated: true)
        }
    }
}
