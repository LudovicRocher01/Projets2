package com.example.tp_rocherludovic

import com.example.tp_rocherludovic.models.ApiDataList
import retrofit2.http.GET

interface RetrofitService {

    @GET("records")
    suspend fun fetchDataFromApi(): ApiDataList
}
