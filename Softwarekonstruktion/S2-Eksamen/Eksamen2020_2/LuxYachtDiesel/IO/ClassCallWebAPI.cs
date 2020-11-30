using Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Newtonsoft.Json;
using System.IO;
using System.Net;

namespace IO
{
    public class ClassCallWebAPI
    {
        public ClassCallWebAPI()
        {

        }


        /// <summary>
        /// This method creates the connection the webApi.
        ///  We make an instance of MemoryStream, 
        ///  this is the object which contains the return of our request as a collection of bytes.
        ///  Create an abstract variable webReq which holds the actual request.
        ///  The request has to be made as a WebRequest which has to be casted to a HTTPWebRequest, this means we by force transform.
        ///  We do this as we can't make a HTTPWebRequest with the parameters that are available, 
        ///  but as there is a overloaded constructor in the class which can convert a WebRequest into a HTTPWebRequest instance
        ///  we obtain that the communication between the application and the WEB API is via the HTTP protocol
        ///  The actual communication with the WEB API is wrapped in a "using", 
        ///  as we want the actual connection to be closed properly after use without having to write to much code, 
        ///  as using and GarbageCollector will do this for us.
        ///  In the first using we start the request, as we are communicating with and external device
        ///  we use await to imply that this part can be executed asynchronized.
        ///  This means that if the WEB API doesnt answer at once, the application will give the right to execute new actions,
        ///  to a new thread and as soon as the WEB API begins to answer, 
        ///  this method will once again recieve the highed priority to execute actions.
        ///  the instance webReq has to be translated to a WebResponse, which is the object that holds the connection to the WEB API.
        ///  The instance response has to be translated to a Stream which,
        ///  handles the data packages which are recieved via the HTTP protocol.
        ///  The instance of our Stream(responseStream) also uses await as there can't be transfered data to our content 
        ///  of datatype MemoryStream before all packages have been received from the WEB API 
        ///  because content is not completely build until all packages are recieved. This is why we use async, 
        ///  so the program doesnt freeze trying to deliver content to the gui, when not all data has been recieved.
        ///  When all packages are recieved we convert them to a MemoryStream.
        ///  Now we have to ensure that the text we recieve as answer is readable by our application.
        ///  Therefore we make an encoding to UTF8 which ensures all nordical characters are recognized and showable.
        ///  Now we have a dataset which can be be converted to our own simple datatype classCityWeather via JsonConvert,
        ///  here we imply which class we want to convert to and a indication of the source to the data which 
        ///  have to be implemented in the datatype.
        ///  Then we return an instance of ClassCityWeather which now contains all the data we have recieved from the Web API.
        /// </summary>
        /// <returns>Task<ClassCurrency></returns>
        public async Task<ClassCurrency> GetURLContentsAsync()
        {

            ClassCurrency CC = new ClassCurrency();
            var content = new MemoryStream();
            var webReq = (HttpWebRequest)WebRequest.Create($"https://openexchangerates.org/api/latest.json?app_id=02ce56841b244b9ebd18d47a7d8c40e7");

            using (WebResponse response = await webReq.GetResponseAsync())
            {
                using (Stream responseStream = response.GetResponseStream())
                {
                    await responseStream.CopyToAsync(content);
                }
            }

            string strRes = System.Text.Encoding.UTF8.GetString(content.ToArray()); // content is byte, if we make them into an array we can use encoding to make a readable string
            CC = JsonConvert.DeserializeObject<ClassCurrency>(strRes); // JsonConvert class has a method called Deserialze object, 
                                                                                        // the method needs an indication of the object it needs to build(ClassCityWeather) 
                                                                                        // and a parameter which here is a string that contains the data recieved fromt the api as a string in Json format
            return CC;
        }
    }
}
