package com.example.projetiot.views

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.example.projetiot.R
import com.example.projetiot.splashactivities.SplashActivityLogin
import com.google.firebase.auth.FirebaseAuth

class LoginActivity : AppCompatActivity() {

    private lateinit var editTextEmail: EditText
    private lateinit var editTextPassword: EditText
    private lateinit var buttonLogin: Button
    private lateinit var auth: FirebaseAuth
    private lateinit var errorMessageTextView: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        editTextEmail = findViewById(R.id.editTextEmail)
        editTextPassword = findViewById(R.id.editTextPassword)
        buttonLogin = findViewById(R.id.buttonLogin)
        auth = FirebaseAuth.getInstance()
        errorMessageTextView = findViewById(R.id.errorMessageTextView)

        // Connexion sécurisée avec FireBase
        buttonLogin.setOnClickListener {
            val email = editTextEmail.text.toString()
            val password = editTextPassword.text.toString()

            if (email.isEmpty() || password.isEmpty()) {
                val errorMessage = "Veuillez remplir tous les champs"
                errorMessageTextView.text = errorMessage
            }

            else {
                signIn(email, password)
            }
        }
    }

    private fun signIn(email: String, password: String) {
        auth.signInWithEmailAndPassword(email, password)
        FirebaseAuth.getInstance().signInWithEmailAndPassword(email, password)
            .addOnCompleteListener(this) { task ->
                if (task.isSuccessful) {
                    // Connexion réussie, redirection
                    val intent = Intent(this, SplashActivityLogin::class.java)
                    startActivity(intent)
                    finish()
                } else {
                    // Echec connexion
                    val errorMessage = "Mot de passe ou mail invalide"
                    errorMessageTextView.text = errorMessage

                    // Erreur dans le Log
                    Log.e("FirebaseAuth", "Erreur de connexion : ${task.exception?.message}", task.exception)
                }
            }

    }
}
