class Router:
    def __init__(self):
        self.routes = {}

    def add_route(self, path, methods, func):
        for method in methods:
            self.routes[(path, method)] = func

    def handle_request(self, path, methods):
        for method in methods:
            if (path, method) in self.routes:
                response_body = self.routes[(path, method)]()
                return {'status': 200, 'body': response_body}
        return {'status': 404, 'body': '{"error": "Not Found"}'}