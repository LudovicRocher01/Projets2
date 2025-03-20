//
//  SettingsViewController.swift
//  Alkool
//
//  Created by Ludovic Rocher on 27/01/2025.
//

import UIKit

class SettingsViewController: UIViewController {

    var players: [Player] = []
    
    let themes = [
            ("Catégorie", "folder.fill"),
            ("Je n'ai jamais", "hand.raised.fill"),
            ("Culture G", "book.fill"),
            ("Vrai ou Faux", "checkmark.circle.fill"),
            ("Qui pourrait", "questionmark.circle.fill"),
            ("Jeux", "gamecontroller.fill"),
            ("Débats", "bubble.left.and.bubble.right.fill"),
            ("Autres", "sparkles")
        ]
    
    private var selectedThemes: [String] = []
    private var themesCollectionView: UICollectionView!
    
    @IBOutlet weak var questionsSlider: UISlider!
    @IBOutlet weak var questionsLabel: UILabel!
    @IBOutlet weak var chooseLabel: UILabel!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()

        setupCollectionView()
        updateQuestionsLabel()
    }
    
    
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        if segue.identifier == "StartGameSegue" {
            if let destinationVC = segue.destination as? GameViewController {
                destinationVC.players = self.players
                destinationVC.totalQuestions = Int(questionsSlider.value)
                destinationVC.selectedThemes = selectedThemes
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
            self.dismiss(animated: true)
        }
    }
    
    private func setupCollectionView() {
        let layout = UICollectionViewFlowLayout()
        layout.minimumInteritemSpacing = 10
        layout.minimumLineSpacing = 15
        let width = (view.frame.size.width - 30) / 2
        layout.itemSize = CGSize(width: width, height: 90)

        themesCollectionView = UICollectionView(frame: .zero, collectionViewLayout: layout)
        themesCollectionView.translatesAutoresizingMaskIntoConstraints = false
        themesCollectionView.backgroundColor = .clear
        themesCollectionView.allowsMultipleSelection = true
        themesCollectionView.delegate = self
        themesCollectionView.dataSource = self

        themesCollectionView.register(ThemeCollectionViewCell.self, forCellWithReuseIdentifier: "ThemeCell")

        view.addSubview(themesCollectionView)

        NSLayoutConstraint.activate([
            themesCollectionView.topAnchor.constraint(equalTo: chooseLabel.bottomAnchor, constant: 20),
            themesCollectionView.leadingAnchor.constraint(equalTo: view.leadingAnchor, constant: 10),
            themesCollectionView.trailingAnchor.constraint(equalTo: view.trailingAnchor, constant: -10),
            themesCollectionView.bottomAnchor.constraint(equalTo: questionsSlider.topAnchor, constant: -20)
        ])
    }
}

extension SettingsViewController: UICollectionViewDelegate, UICollectionViewDataSource {
    func collectionView(_ collectionView: UICollectionView, numberOfItemsInSection section: Int) -> Int {
        themes.count
    }
    
    func collectionView(_ collectionView: UICollectionView, cellForItemAt indexPath: IndexPath) -> UICollectionViewCell {
        let cell = collectionView.dequeueReusableCell(withReuseIdentifier: "ThemeCell", for: indexPath) as! ThemeCollectionViewCell
        
        let theme = themes[indexPath.row]
        cell.configure(themeName: theme.0, iconName: theme.1)
        
        return cell
    }
    
    func collectionView(_ collectionView: UICollectionView, didSelectItemAt indexPath: IndexPath) {
        selectedThemes.append(themes[indexPath.row].0)
    }
    
    func collectionView(_ collectionView: UICollectionView, didDeselectItemAt indexPath: IndexPath) {
        selectedThemes.removeAll { $0 == themes[indexPath.row].0 }
    }
}
