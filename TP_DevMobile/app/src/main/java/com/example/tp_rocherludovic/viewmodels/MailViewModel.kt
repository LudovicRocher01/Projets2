package com.example.tp_rocherludovic.viewmodels

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.example.tp_rocherludovic.models.ContactList

class MailViewModel(private val mailRepository: ContactList) : ViewModel() {

    private val newMailListLiveData = MutableLiveData<List<String>>()

    val mailListLiveData: LiveData<List<String>>
        get() = newMailListLiveData

    init {
        newMailListLiveData.value = mailRepository.getmailList()
    }

    fun addMail(s: String) {
        mailRepository.addMail(s)
        newMailListLiveData.value = mailRepository.getmailList()
    }

    fun deleteMail(index: Int) {
        mailRepository.deleteMail(index)
        newMailListLiveData.value = mailRepository.getmailList()
    }

}
