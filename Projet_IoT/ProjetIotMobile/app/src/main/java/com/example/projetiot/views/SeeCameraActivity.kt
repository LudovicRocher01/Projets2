package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.webkit.WebView
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.views.MainAppActivity
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase


class SeeCameraActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_see_camera)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)

        // Retour vers "Accueil"
        val accueilButton = findViewById<Button>(R.id.mainButton)
        accueilButton.setOnClickListener {
            val intent = Intent(this, MainAppActivity::class.java)
            startActivity(intent)
            finish()
        }

        val mjpegWebView = findViewById<WebView>(R.id.mjpegWebView)
        mjpegWebView.settings.javaScriptEnabled = true
        mjpegWebView.settings.domStorageEnabled = true

        // Chargement de la page web qui affiche le flux MJPEG
        mjpegWebView.loadUrl("http://172.20.10.3:81/stream")



        val database = FirebaseDatabase.getInstance()
        val ledsRef: DatabaseReference = database.getReference("ESP32leds")
        val onleds = findViewById<Button>(R.id.activeLedsButton)
        val offleds = findViewById<Button>(R.id.desactiveLedsButton)

        // Activation/Desactivation des LEDs
        onleds.setOnClickListener {
            ledsRef.setValue(true)
        }

        offleds.setOnClickListener {
            ledsRef.setValue(false)
        }

        bottomNavView.setOnItemSelectedListener { item ->
            when (item.itemId) {
                R.id.VisuDonnées -> {
                    startActivity(Intent(this, SeeDataActivity::class.java))
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
