//
//  ThemeCell.swift
//  Alkool
//
//  Created by Ludovic Rocher on 25/02/2025.
//

import UIKit

class ThemeCell: UICollectionViewCell {
    @IBOutlet weak var themeLabel: UILabel!
    
    func configure(theme: String, isSelected: Bool) {
        themeLabel.text = theme
        themeLabel.textAlignment = .center
        themeLabel.font = UIFont.systemFont(ofSize: 16, weight: .bold)
        
        // Appliquer un style différent si le thème est sélectionné
        if isSelected {
            self.backgroundColor = UIColor.systemGreen
            themeLabel.textColor = .white
        } else {
            self.backgroundColor = UIColor.systemGray5
            themeLabel.textColor = .black
        }
        
        self.layer.cornerRadius = 10
        self.layer.masksToBounds = true
    }
}
