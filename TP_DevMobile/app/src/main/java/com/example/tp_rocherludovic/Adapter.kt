package com.example.tp_rocherludovic

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ArrayAdapter
import android.widget.TextView
import com.example.tp_rocherludovic.models.ApiData

class Adapter(context: Context, resource: Int, private val dataList: List<ApiData>) :
    ArrayAdapter<ApiData>(context, resource, dataList) {

    override fun getView(position: Int, convertView: View?, parent: ViewGroup): View {
        val itemView = convertView ?: LayoutInflater.from(context).inflate(R.layout.api_item, parent, false)

        val item = getItem(position)
        val yearTextView = itemView.findViewById<TextView>(R.id.year)
        val countryTextView = itemView.findViewById<TextView>(R.id.country)
        val speciesTextView = itemView.findViewById<TextView>(R.id.species)

        item?.let {
            yearTextView.text = "Année : ${it.year}"
            countryTextView.text = "Pays : ${it.country}"
            speciesTextView.text = "Espèce : ${it.species}"
        }

        return itemView
    }
}
