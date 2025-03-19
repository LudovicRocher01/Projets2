//
//  Player.swift
//  Alkool
//
//  Created by Ludovic Rocher on 24/01/2025.
//

import Foundation

class Player {
    var name: String
    var score: Int
    
    init(name: String, score: Int = 0) {
        self.name = name
        self.score = score
    }
}
