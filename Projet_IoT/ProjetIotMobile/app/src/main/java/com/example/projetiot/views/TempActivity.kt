package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.*

class TempActivity : AppCompatActivity() {

    private lateinit var tempRef: DatabaseReference
    private lateinit var tminRef: DatabaseReference

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_temp)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)

        val settemp = findViewById<Button>(R.id.settemp)
        val mainButton = findViewById<Button>(R.id.mainButton)
        val messageTextView = findViewById<TextView>(R.id.safetyTextView)

        // Gestion des températures
        settemp.setOnClickListener {
            val intent = Intent(this@TempActivity, SetTempActivity::class.java)
            startActivity(intent)
        }

        // Retour vers "Accueil"
        mainButton.setOnClickListener {
            val intent = Intent(this@TempActivity, MainAppActivity::class.java)
            startActivity(intent)
        }

        val database = FirebaseDatabase.getInstance()
        val HeatingRef: DatabaseReference = database.getReference("ESP32heating")
        val heatingButton = findViewById<Button>(R.id.heating)
        HeatingRef.setValue(false)
        var heating = false

        // Réchauffer nid
        heatingButton.setOnClickListener {
            if (heating) {
                HeatingRef.setValue(false)
                heating = false
            } else {
                HeatingRef.setValue(true)
                heating = true
            }
        }

        tempRef = database.getReference("ESP32data/TEMPERATURE")
        tminRef = database.getReference("ESP32tmin")

        // Vérifie si Tmin < Tactuel
        val tempListener = object : ValueEventListener {
            override fun onDataChange(dataSnapshot: DataSnapshot) {
                val tempValue = dataSnapshot.getValue(Double::class.java)

                if (tempValue != null) {
                    tminRef.addValueEventListener(object : ValueEventListener {
                        override fun onDataChange(tminSnapshot: DataSnapshot) {
                            val tminValue = tminSnapshot.getValue(Float::class.java)

                            if (tminValue != null) {
                                if (tempValue < tminValue) {
                                    messageTextView.text = "Température trop faible !"
                                } else {
                                    messageTextView.text = "Température stable"
                                }
                            }
                        }

                        override fun onCancelled(databaseError: DatabaseError) {
                            // Gestion des erreurs
                        }
                    })
                }
            }

            override fun onCancelled(databaseError: DatabaseError) {
                // Gestion des erreurs
            }
        }

        tempRef.addValueEventListener(tempListener)

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