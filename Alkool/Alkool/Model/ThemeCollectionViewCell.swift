//
//  ThemeCollectionViewCell.swift
//  Alkool
//
//  Created by Ludovic Rocher on 20/03/2025.
//

import UIKit

class ThemeCollectionViewCell: UICollectionViewCell {
    
    private let themeLabel = UILabel()
    private let themeIcon = UIImageView()

    override init(frame: CGRect) {
        super.init(frame: frame)
        configureCell()
    }

    required init?(coder: NSCoder) {
        fatalError("init(coder:) has not been implemented")
    }

    private func configureCell() {
        contentView.backgroundColor = UIColor(hex: "#E63946")
        contentView.layer.cornerRadius = 10
        contentView.layer.borderWidth = 1
        contentView.layer.borderColor = UIColor.systemGray4.cgColor
        contentView.clipsToBounds = true

        themeIcon.translatesAutoresizingMaskIntoConstraints = false
        themeIcon.tintColor = UIColor(hex: "#FAEBD7")
        contentView.addSubview(themeIcon)

        themeLabel.translatesAutoresizingMaskIntoConstraints = false
        themeLabel.font = UIFont.systemFont(ofSize: 16, weight: .bold)
        themeLabel.textColor = UIColor(hex: "#FAEBD7")
        themeLabel.textAlignment = .center
        themeLabel.numberOfLines = 0
        contentView.addSubview(themeLabel)

        NSLayoutConstraint.activate([
            themeIcon.centerXAnchor.constraint(equalTo: contentView.centerXAnchor),
            themeIcon.topAnchor.constraint(equalTo: contentView.topAnchor, constant: 10),
            themeIcon.heightAnchor.constraint(equalToConstant: 30),
            themeIcon.widthAnchor.constraint(equalToConstant: 30),

            themeLabel.topAnchor.constraint(equalTo: themeIcon.bottomAnchor, constant: 5),
            themeLabel.leadingAnchor.constraint(equalTo: contentView.leadingAnchor, constant: 5),
            themeLabel.trailingAnchor.constraint(equalTo: contentView.trailingAnchor, constant: -5),
            themeLabel.bottomAnchor.constraint(equalTo: contentView.bottomAnchor, constant: -10)
        ])
    }

    override var isSelected: Bool {
        didSet {
            let selectedColor = UIColor(hex: "#A60000")
            let deselectedColor = UIColor(hex: "#E63946")
            
            contentView.backgroundColor = isSelected ? selectedColor : deselectedColor
            themeLabel.textColor = UIColor(hex: "#FAEBD7")
            themeIcon.tintColor = .white
        }
    }


    func configure(themeName: String, iconName: String) {
        themeLabel.text = themeName
        themeIcon.image = UIImage(systemName: iconName)
    }
}
