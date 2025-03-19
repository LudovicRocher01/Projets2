//
//  SettingsViewController.swift
//  Alkool
//
//  Created by Ludovic Rocher on 27/01/2025.
//

import UIKit

class SettingsViewController: UIViewController {

    var players: [Player] = []
    var selectedThemes: [String] = []
    
    @IBOutlet weak var questionsSlider: UISlider!
    @IBOutlet weak var questionsLabel: UILabel!
    
    override func viewDidLoad() {
        super.viewDidLoad()

        updateQuestionsLabel()
    }
    
    
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        if segue.identifier == "StartGameSegue" {
            if let destinationVC = segue.destination as? GameViewController {
                destinationVC.players = self.players
                
                let questionsCount = Int(questionsSlider.value)
                destinationVC.totalQuestions = questionsCount
            }
        }
    }
    
    @IBAction func sliderValueChanged(_ sender: UISlider) {
        let sliderValue = round(sender.value / 5) * 5
        sender.value = sliderValue
        
        updateQuestionsLabel()
    }
    
    private func updateQuestionsLabel() {
        let questionsCount = Int(questionsSlider.value)
        questionsLabel.text = "Nombre de questions : \(questionsCount)"
    }
    
    @IBAction func BackWelcome(_ sender: UIButton) {
        if let navigationController = self.navigationController {
            navigationController.popViewController(animated: true)
        } else {
            // Sinon, fermer la vue modale
            self.dismiss(animated: true)
        }
    }
}
