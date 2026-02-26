import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiService {
  static const String baseUrl = "http://127.0.0.1:8000/api";

  Future<Map<String, dynamic>> ping() async {
    print("Calling: $baseUrl/ping");

    final response = await http.get(Uri.parse("$baseUrl/ping"));

    print("Status: ${response.statusCode}");
    print("Body: ${response.body}");

    if (response.statusCode == 200) {
      return jsonDecode(response.body);
    } else {
      throw Exception("API error: ${response.statusCode}");
    }
  }
}
