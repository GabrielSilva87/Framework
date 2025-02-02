from router import Router

class App:
    def __init__(self):
        self.router = Router()

    def route(self, path, methods):
        def wrapper(func):
            self.router.add_route(path, methods, func)
            return func
        return wrapper

    def run(self, host='127.0.0.1', port=5000):
        from http.server import BaseHTTPRequestHandler, HTTPServer

        class RequestHandler(BaseHTTPRequestHandler):
            def do_GET(self):
                response = self.router.handle_request(self.path, ['GET'])
                self.send_response(response['status'])
                self.send_header('Content-type', 'application/json')
                self.end_headers()
                self.wfile.write(response['body'].encode())

            def do_POST(self):
                response = self.router.handle_request(self.path, ['POST'])
                self.send_response(response['status'])
                self.send_header('Content-type', 'application/json')
                self.end_headers()
                self.wfile.write(response['body'].encode())

        server = HTTPServer((host, port), RequestHandler)
        print(f'Servindo em http://{host}:{port}')
        server.serve_forever()