package com.example.tp_rocherludovic.viewmodels

import android.util.Log
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.example.tp_rocherludovic.RetrofitService
import com.example.tp_rocherludovic.models.ApiData
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch

class ApiViewModel(private val apiService: RetrofitService) : ViewModel() {
    private val _apiDataList = MutableLiveData<List<ApiData>>()
    val apiDataList: LiveData<List<ApiData>> = _apiDataList

    fun fetchAPI() {
        viewModelScope.launch(Dispatchers.IO) {
            try {
                val apiDataList = apiService.fetchDataFromApi()
                val resultsFromApi = apiDataList.results
                _apiDataList.postValue(resultsFromApi)
            } catch (e: Exception) {
                Log.e("error", e.localizedMessage)
            }
        }
    }

    fun getApiData(): LiveData<List<ApiData>> {
        return apiDataList
    }
}