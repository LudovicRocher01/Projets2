package com.example.tp_rocherludovic.views

import android.os.Bundle
import android.widget.ArrayAdapter
import androidx.appcompat.app.AppCompatActivity
import com.example.tp_rocherludovic.databinding.ActivityMailBinding
import com.example.tp_rocherludovic.viewmodels.MailViewModel
import org.koin.androidx.viewmodel.ext.android.viewModel

class MailActivity : AppCompatActivity() {

    private val mailViewModel: MailViewModel by viewModel()
    private lateinit var binding: ActivityMailBinding
    private lateinit var adapter: ArrayAdapter<String>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMailBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val mail = intent.getStringExtra("email") ?: ""
        binding.textViewMail.text = "Email : $mail"

        initListView()
        initViewModel(mail)
    }

    private fun initListView() {
        adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1)
        binding.oneMail.adapter = adapter

        binding.oneMail.setOnItemClickListener { _, _, position, _ ->
            mailViewModel.deleteMail(position)
        }
    }

    private fun initViewModel(mail: String) {
        mailViewModel.mailListLiveData.observe(this) { emailReceived ->
            adapter.clear()
            adapter.addAll(emailReceived)
            adapter.notifyDataSetChanged()
        }

        mailViewModel.addMail(mail)
    }

    override fun onBackPressed() {
        finish()
    }
}
