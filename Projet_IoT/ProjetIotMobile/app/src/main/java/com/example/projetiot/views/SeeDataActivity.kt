package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.views.MainAppActivity
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.google.firebase.FirebaseApp
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener

class SeeDataActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_see_data)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)

        // Retour vers "Accueil"
        val accueilButton = findViewById<Button>(R.id.mainButton)
        accueilButton.setOnClickListener {
            val intent = Intent(this, MainAppActivity::class.java)
            startActivity(intent)
            finish()
        }

        val data2Button = findViewById<Button>(R.id.donnesrecoltees)
        data2Button.setOnClickListener {
            val intent = Intent(this, SeeDataActivity2::class.java)
            startActivity(intent)
            finish()
        }

        val databaseReference = FirebaseDatabase.getInstance().getReference()

        val tempValueTextView = findViewById<TextView>(R.id.tempValueTextView)
        val temperatureRef = databaseReference.child("ESP32data/TEMPERATURE")

        // Affichage des différents paramètres
        temperatureRef.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {
                val temperature = snapshot.getValue(Float::class.java)
                if (temperature != null) {
                    tempValueTextView.text = "Temp: $temperature °C"
                } else {
                    tempValueTextView.text = "Temp: N/A"
                }
            }

            override fun onCancelled(error: DatabaseError) {
                tempValueTextView.text = "Temp: Error"
            }
        })

        val humidValueTextView = findViewById<TextView>(R.id.humidValueTextView)
        val humidityRef = databaseReference.child("ESP32data/HUMIDITY")

        humidityRef.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {
                val humidity = snapshot.getValue(Float::class.java)
                if (humidity != null) {
                    humidValueTextView.text = "Humidity: $humidity %"
                } else {
                    humidValueTextView.text = "Humidity: N/A"
                }
            }

            override fun onCancelled(error: DatabaseError) {
                humidValueTextView.text = "Humidity: Error"
            }
        })


        val lightValueTextView = findViewById<TextView>(R.id.luminValueTextView)
        val lightRef = databaseReference.child("ESP32data/LIGHT")

        lightRef.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {
                val light = snapshot.getValue(Float::class.java)
                if (light != null) {
                    val light = (light/2800) * 100
                    // ajout de code si l'on veut garder deux chiffres après la virgule
                    // val light = String.format("%.2f", light)
                    lightValueTextView.text = "Luminosité: $light %"
                } else {
                    lightValueTextView.text = "Luminosité : N/A"
                }
            }

            override fun onCancelled(error: DatabaseError) {
                lightValueTextView.text = "Luminosité : Error"
            }
        })

        val soundValueTextView = findViewById<TextView>(R.id.soundValueTextView)
        val soundRef = databaseReference.child("ESP32data/SOUND")

        soundRef.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {
                val sound = snapshot.getValue(Float::class.java)
                if (sound != null) {
                    val sound = (sound/2500) * 100
                    // ajout de code si l'on veut garder deux chiffres après la virgule
                    // val sound = String.format("%.2f", sound)
                    soundValueTextView.text = "Niveau Sonore: $sound %"
                } else {
                    soundValueTextView.text = "Niveau Sonore : N/A"
                }
            }

            override fun onCancelled(error: DatabaseError) {
                soundValueTextView.text = "Niveau Sonore : Error"
            }
        })

        bottomNavView.setOnItemSelectedListener { item ->
            when (item.itemId) {
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
