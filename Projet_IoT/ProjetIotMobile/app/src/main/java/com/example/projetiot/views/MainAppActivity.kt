package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import com.example.projetiot.R
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.bottomnavigation.BottomNavigationView

// Page principale lorsque l'on est connecté
class MainAppActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main_app)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)

        bottomNavView.setOnItemSelectedListener { item ->
            when (item.itemId) {
                R.id.VisuDonnées -> {
                    startActivity(Intent(this, SeeDataActivity::class.java))
                    true
                }
                R.id.AccesCamera -> {
                    startActivity(Intent(this, SeeCameraActivity::class.java))
                    true
                }
                R.id.GererTemp -> {
                    startActivity(Intent(this, TempActivity::class.java))
                    true
                }
                else -> false
            }
        }
    }
}


