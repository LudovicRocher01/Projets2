package com.example.projetiot.splashactivities

import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.content.Intent
import android.widget.ImageView
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.views.MainAppActivity

class SplashActivityLogin : AppCompatActivity() {

    private val SPLASH_TIMEOUT: Long = 3000

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.splash_screen)

        val gifImageView = findViewById<ImageView>(R.id.gifImageView)
        gifImageView.setImageResource(R.drawable.loading_bird)



        val handler = Handler(Looper.getMainLooper())
        handler.postDelayed({
            val mainIntent = Intent(this@SplashActivityLogin, MainAppActivity::class.java)
            startActivity(mainIntent)
            finish()
        }, SPLASH_TIMEOUT)
    }
}

