package com.example.tp_rocherludovic.models

class ContactList {

    private val mailList = mutableListOf<String>()

    fun addMail(s: String) {
        mailList.add(s)
    }

    fun deleteMail(i: Int) {
        if (i >= 0 && i < mailList.size) {
            mailList.removeAt(i)
        }
    }

    fun getmailList() : List<String> {
        return mailList.toList()
    }

}