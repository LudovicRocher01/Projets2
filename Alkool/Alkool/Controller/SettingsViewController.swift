//
//  SettingsViewController.swift
//  Alkool
//
//  Created by Ludovic Rocher on 27/01/2025.
//

import UIKit

class SettingsViewController: UIViewController, UITableViewDelegate, UITableViewDataSource {

    var players: [Player] = []
    let themes = [
        "Catégorie",
        "Je n'ai jamais",
        "Culture G",
        "Vrai ou Faux",
        "Qui pourrait",
        "Jeux",
        "Débats",
        "Autres"
    ]
    
    @IBOutlet weak var questionsSlider: UISlider!
    @IBOutlet weak var questionsLabel: UILabel!
    @IBOutlet weak var themesTableView: UITableView!
    
    override func viewDidLoad() {
        super.viewDidLoad()

        updateQuestionsLabel()
        themesTableView.delegate = self
        themesTableView.dataSource = self
        themesTableView.allowsMultipleSelection = true
    }
    
    
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        if segue.identifier == "StartGameSegue" {
            if let destinationVC = segue.destination as? GameViewController {
                destinationVC.players = self.players
                
                let questionsCount = Int(questionsSlider.value)
                destinationVC.totalQuestions = questionsCount
                destinationVC.selectedThemes = getSelectedThemes()
            }
        }
    }
    
    func numberOfSections(in tableView: UITableView) -> Int {
        return 1
    }

    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return themes.count
    }

    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCell(withIdentifier: "ThemeCell", for: indexPath)
        cell.textLabel?.text = themes[indexPath.row]
        return cell
    }

    func getSelectedThemes() -> [String] {
        guard let selectedIndexPaths = themesTableView.indexPathsForSelectedRows else {
            return []
        }
        return selectedIndexPaths.map { themes[$0.row] }
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
