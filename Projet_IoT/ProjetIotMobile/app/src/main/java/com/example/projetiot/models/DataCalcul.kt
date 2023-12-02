package com.example.projetiot.models

class DataCalcul {

    // Calculs pour les moyennes, valeues minimales et valeurs maximales

    fun averageTemperature(dataList: List<SensorData>): Float {
        return if (dataList.isNotEmpty()) {
            val sum = dataList.sumOf { it.TEMPERATURE.toDouble() }
            (sum / dataList.size).toFloat()
        } else {
            0.0f
        }
    }

    fun averageHumidity(dataList: List<SensorData>): Float {
        return if (dataList.isNotEmpty()) {
            val sum = dataList.sumOf { it.HUMIDITY.toDouble() }
            (sum / dataList.size).toFloat()
        } else {
            0.0f
        }
    }

    fun averageLight(dataList: List<SensorData>): Float {
        return if (dataList.isNotEmpty()) {
            val sum = dataList.sumOf { it.LIGHT.toDouble() }
            (sum / dataList.size).toFloat()
        } else {
            0.0f
        }
    }

    fun averageSound(dataList: List<SensorData>): Float {
        return if (dataList.isNotEmpty()) {
            val sum = dataList.sumOf { it.SOUND.toDouble() }
            (sum / dataList.size).toFloat()
        } else {
            0.0f
        }
    }

    fun minTemperature(dataList: List<SensorData>): Float {
        return dataList.minByOrNull { it.TEMPERATURE }?.TEMPERATURE ?: 0.0f
    }

    fun maxTemperature(dataList: List<SensorData>): Float {
        return dataList.maxByOrNull { it.TEMPERATURE }?.TEMPERATURE ?: 0.0f
    }

    fun minHumidity(dataList: List<SensorData>): Float {
        return dataList.minByOrNull { it.HUMIDITY }?.HUMIDITY ?: 0.0f
    }

    fun maxHumidity(dataList: List<SensorData>): Float {
        return dataList.maxByOrNull { it.HUMIDITY }?.HUMIDITY ?: 0.0f
    }

    fun minLight(dataList: List<SensorData>): Float {
        return dataList.minByOrNull { it.LIGHT }?.LIGHT ?: 0.0f
    }

    fun maxLight(dataList: List<SensorData>): Float {
        return dataList.maxByOrNull { it.LIGHT }?.LIGHT ?: 0.0f
    }

    fun minSound(dataList: List<SensorData>): Float {
        return dataList.minByOrNull { it.SOUND }?.SOUND ?: 0.0f
    }

    fun maxSound(dataList: List<SensorData>): Float {
        return dataList.maxByOrNull { it.SOUND }?.SOUND ?: 0.0f
    }
}
