package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.splashactivities.SplashActivitySetTemp
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase

class SetTempActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_set_temp)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)


        // Retour vers "Accueil"
        val accueilButton = findViewById<Button>(R.id.mainButton)
        accueilButton.setOnClickListener {
            val intent = Intent(this, MainAppActivity::class.java)
            startActivity(intent)
            finish()
        }

        val returnButton = findViewById<Button>(R.id.back)
        returnButton.setOnClickListener {
            val intent = Intent(this, TempActivity::class.java)
            startActivity(intent)
            finish()
        }

        val database = FirebaseDatabase.getInstance()
        val tminRef: DatabaseReference = database.getReference("ESP32tmin")
        val tmin = findViewById<EditText>(R.id.tminInput)

        // Permet d'enregistrer la valeur de température minimale saisie par l'utilisateur
        val validate = findViewById<Button>(R.id.validateButton)
        validate.setOnClickListener {
            val tminText = tmin.text.toString()

            if (tminText.isNotEmpty()) {
                // Convertir les valeurs en float
                val tmin = tminText.toFloat()
                tminRef.setValue(tmin)
                val intent = Intent(this, SplashActivitySetTemp::class.java)
                startActivity(intent)
                finish()
            }
        }

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
                else -> false
            }
        }

    }
}
