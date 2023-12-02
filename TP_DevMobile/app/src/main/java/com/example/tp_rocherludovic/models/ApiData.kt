package com.example.tp_rocherludovic.models


data class ApiData(
    val year: Int,
    val country: String,
    val species: String,
)

data class ApiDataList(
    val results:List<ApiData>
)
