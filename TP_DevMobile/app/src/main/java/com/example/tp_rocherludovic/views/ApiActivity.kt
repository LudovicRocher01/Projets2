package com.example.tp_rocherludovic.views

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.tp_rocherludovic.models.ApiData
import com.example.tp_rocherludovic.Adapter
import com.example.tp_rocherludovic.R
import com.example.tp_rocherludovic.viewmodels.ApiViewModel
import com.example.tp_rocherludovic.databinding.ActivityApiBinding
import org.koin.androidx.viewmodel.ext.android.viewModel

class ApiActivity : AppCompatActivity() {

    private lateinit var binding: ActivityApiBinding
    private lateinit var apiAdapter: Adapter
    private val apiVM: ApiViewModel by viewModel()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityApiBinding.inflate(layoutInflater)
        setContentView(binding.root)

        initListView()
        initViewModel()
    }

    private fun initListView() {
        val list: MutableList<ApiData> = mutableListOf()
        apiAdapter = Adapter(this, R.layout.api_item, list)
        binding.listViewAPI.adapter = apiAdapter
    }

    private fun initViewModel() {
        apiVM.getApiData().observe(this) { apiDataList ->
            apiAdapter.clear()
            apiAdapter.addAll(apiDataList)
            apiAdapter.notifyDataSetChanged()
        }
        apiVM.fetchAPI()
    }
}
