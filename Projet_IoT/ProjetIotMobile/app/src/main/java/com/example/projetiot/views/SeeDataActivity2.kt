package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.models.SensorData
import com.example.projetiot.models.DataCalcul
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener

class SeeDataActivity2 : AppCompatActivity() {

    val sensorDataList = mutableListOf<SensorData>()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_see_data_2)

        val bottomNavView = findViewById<BottomNavigationView>(R.id.bottomNavView)

        val accueilButton = findViewById<Button>(R.id.mainButton)
        accueilButton.setOnClickListener {
            val intent = Intent(this, MainAppActivity::class.java)
            startActivity(intent)
            finish()
        }

        val data2Button = findViewById<Button>(R.id.donneesdirectes)
        data2Button.setOnClickListener {
            val intent = Intent(this, SeeDataActivity::class.java)
            startActivity(intent)
            finish()
        }

        val databaseReference = FirebaseDatabase.getInstance().getReference()
        val tempValueTextView = findViewById<TextView>(R.id.tempValueTextView)
        val humidValueTextView = findViewById<TextView>(R.id.humidValueTextView)
        val lightValueTextView = findViewById<TextView>(R.id.luminValueTextView)
        val soundValueTextView = findViewById<TextView>(R.id.soundValueTextView)
        val sensorDataRef = databaseReference.child("ESP32data")

        // Affichage des différents paramètres
        sensorDataRef.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {
                val sensorDataSnapshot = snapshot.getValue(SensorData::class.java)
                if (sensorDataSnapshot != null) {
                    sensorDataList.add(sensorDataSnapshot)

                    // Calculez les valeurs moyennes, minimales et maximales
                    val dataCalcul = DataCalcul()
                    val averageTemperature = dataCalcul.averageTemperature(sensorDataList)
                    val minTemperature = dataCalcul.minTemperature(sensorDataList)
                    val maxTemperature = dataCalcul.maxTemperature(sensorDataList)

                    val averageHumidity = dataCalcul.averageHumidity(sensorDataList)
                    val minHumidity = dataCalcul.minHumidity(sensorDataList)
                    val maxHumidity = dataCalcul.maxHumidity(sensorDataList)

                    val averageLight = dataCalcul.averageLight(sensorDataList)
                    val minLight = dataCalcul.minLight(sensorDataList)
                    val maxLight = dataCalcul.maxLight(sensorDataList)

                    val averageSound = dataCalcul.averageSound(sensorDataList)
                    val minSound = dataCalcul.minSound(sensorDataList)
                    val maxSound = dataCalcul.maxSound(sensorDataList)

                    // Affichage des moyennes, valeurs minimales et maximales
                    tempValueTextView.text = "Temp/ Avg: $averageTemperature°C, Min: $minTemperature°C, Max: $maxTemperature°C"
                    humidValueTextView.text = "Humidity/ Avg: $averageHumidity%, Min: $minHumidity%, Max: $maxHumidity%"
                    lightValueTextView.text = "Luminosité/ Avg: $averageLight%, Min: $minLight%, Max: $maxLight%"
                    soundValueTextView.text = "Niveau Sonore/ Avg: $averageSound%, Min: $minSound%, Max: $maxSound%"
                }
            }

            override fun onCancelled(error: DatabaseError) {
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

