package com.example.tp_rocherludovic.views

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import com.example.tp_rocherludovic.R
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tp_rocherludovic.databinding.ActivityMainBinding
import com.example.tp_rocherludovic.viewmodels.MailViewModel
import org.koin.androidx.viewmodel.ext.android.viewModel

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding
    private val mailViewModel: MailViewModel by viewModel()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        binding = ActivityMainBinding.inflate(layoutInflater)
        val view = binding.root
        setContentView(view)

        binding.valideMail.setOnClickListener {
            val genre = when (binding.Genre.checkedRadioButtonId) {
                binding.Homme.id -> "M"
                binding.Femme.id -> "F"
                binding.Autre.id -> "Autre"
                else -> "null"
            }
            val email = binding.Mail.text.toString()

            if (email.isEmpty() || !isEmailValid(email)) {
                showToast("Adresse mail non valide")
            } else {

                /* TP 1&2
                val message = "Genre: $selectedGender\nEmail: $email"
                showMessage("Informations valides", message) */

                // TP 3&4&5
                val intent = Intent(this, MailActivity::class.java)
                intent.putExtra("email", email)
                intent.putExtra("genre", genre)
                startActivity(intent)

            }


        }

        val apiDataButton = findViewById<Button>(R.id.APIButton)
        apiDataButton.setOnClickListener {
            startActivity(Intent(this, ApiActivity::class.java))
        }

    }

    private fun isEmailValid(email: String): Boolean {
        val emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+"
        return email.matches(emailPattern.toRegex())
    }

    /* TP 1&2
    private fun showMessage(title: String, message: String) {
        val builder = AlertDialog.Builder(this)
        builder.setTitle(title)
        builder.setMessage(message)
        builder.setPositiveButton("OK") { dialog, _ ->
            dialog.dismiss()
        }
        val dialog = builder.create()
        dialog.show()
    } */

    private fun showToast(message: String) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show()
    }
}

