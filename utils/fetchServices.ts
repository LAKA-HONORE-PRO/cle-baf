
interface FetchService {
  fetch: (url: string, method: "get" | "post", body?: any) => any;
  formDataFetch: (url: string, method: "get" | "post", body?: any) => any;
}

export interface RequestResponse {
  error: boolean;
  error_message?: string;
  datas?: any;
}

const baseUrl = "https://admin.insamtechs.com/api";
// const baseUrl = "http://127.0.0.1:8001/api";

// let options: RequestInit = {
//   headers: {
//     Accept: "application/json",
//   },
//   mode: "cors",
// };

export const FetchService: FetchService = {

  async fetch(url: string, method: "get" | "post", body?: any) {
    let options: RequestInit = {
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      mode: "cors",
      method,
      body: JSON.stringify(body),
    };

    let result: RequestResponse | undefined;

    if (!body) {
      // On serialise le body
      delete options.body;
    }

    try {
      const response: Response = await fetch(baseUrl + url, options);
      result = await manageResponse(response);
    } catch (e: any) {
      result = {
        error: true,
        error_message: e?.message,
      };
    } finally {
      return result;
    }
  },

  async formDataFetch(url: string, method: "get" | "post", body?: any) {
    let options: RequestInit = {
      headers: {
        Accept: "application/json",
      },
      mode: "cors",
      method,
      body,
    };

    let result: RequestResponse | undefined;

    if (!body) {
      // On supprime le body le body
      delete options.body;
    }

    try {
      const response: Response = await fetch(baseUrl + url, options);
      result = await manageResponse(response);
    } catch (e: any) {
      result = {
        error: true,
        error_message: e?.message,
      };
    } finally {
      return result;
    }
  },
};

async function manageResponse(
  response: Response
): Promise<RequestResponse | undefined> {
  switch (response.status) {
    case 500:
    case 502:
    case 503:
      const error_message = await response.text();
      console.log(error_message);

      return {
        error: true,
        // error_message: 'Une erreur s\'est produite du côté serveur.'
        error_message: JSON.parse(error_message).message,
      };
    case 404:
      return {
        error: true,
        error_message: "La route demandée n'existe pas.",
      };
    case 400:
      return {
        error: true,
        error_message: "La requête est invalide ou mal formée",
      };
    default:
      return {
        error: false,
        datas: await response.json(),
      };
  }
}
