<h1>ATS Prototype</h1>

Before you start reading, please note that this is just a prototype and does not address security, error handling, or design considerations. The primary focus has been on defining and developing the concept that will guide future development. I welcome any suggestions, advice, and recommendations you may have.

you gotta slap your name at the top left corner of your resume, capiche? Stick it in the middle and it’s a no-go! Only use black ink and this specific font—no exceptions! Ditch the tables! Wrap dates in quotes! Make those headings pop! And keep it to one page, got it?

Now, listen up. You can't whip up a resume that vibes with ATS systems on your own. Even though you’re hunting for a gig, strapped for cash, and pressed for time, you still gotta shell out some dough for me to make it ATS-friendly. I'll do it for you.

This post and its attachments are not intended to provide a comprehensive and definitive solution to the dilemma faced by most job seekers. Instead, they represent an attempt to explore strategies for developing a thorough search and ATS system for one of my clients.

Different types of ATS use various algorithms and methodologies to rank and filter candidates such as: Keyword-Based ATS, Semantic Search ATS, Boolean Search ATS, AI-Powered ATS, Scoring and Ranking ATS, Social Media Integration ATS, Collaborative Filtering ATS, Predictive Analytics ATS, etc. My primary goal in this research is to develop an Applicant Tracking System (ATS) that allows applicants to submit their resumes and receive a fair and accurate ranking, regardless of resume styles and formatting.

FIRST PART:

At this stage of the research, I will employ the following method: I will remove all styles and formats by converting the CV (PDF) to text and saving it as is in a column in my database table. In my script, the process of extracting text from a PDF involves several client-side operations facilitated by JavaScript and the PDF.js library. When the user submits the form with a PDF file, JavaScript intercepts the form submission and uses the FileReader API to read the PDF file as an ArrayBuffer. This buffer is then processed by PDF.js, which converts it into a Uint8Array and loads the document. The script iterates through each page of the PDF, extracting text content using getTextContent(). This method retrieves an array of text items for each page, which are then concatenated into a single string representing the entire text content of the PDF. This text is appended to the FormData object along with the original form data and sent to the server for further processing and storage in the database. This approach ensures that the text from the PDF is accurately extracted and can be utilized for various purposes, such as search indexing or content analysis.

The approach described for extracting text from PDF documents using JavaScript and the PDF.js library is generally referred to as Client-Side PDF Text Extraction. While this term is not a scientific or official name per se, it accurately describes the method of processing PDF files on the client side (i.e., within the user's browser) to extract and manipulate text content. This approach leverages technologies like the FileReader API and PDF.js for handling and reading PDF files directly in the browser, which can be part of broader concepts like Client-Side Processing or Client-Side Document Processing. These terms emphasize the shift from server-side operations to client-side capabilities, enhancing performance and user experience by reducing server load and latency.

This approach ensures the accurate extraction of text from PDFs through the combined use of modern web technologies and robust libraries specifically designed for PDF handling. Initially, the FileReader API reads the PDF file as an ArrayBuffer, a binary representation of the file, ensuring the file is read in its entirety without any data loss or corruption. Central to this process is PDF.js, a well-maintained open-source library by Mozilla, created to parse and render PDF documents within web browsers. PDF.js accurately interprets the complex structure of PDFs, which includes text, fonts, images, and other elements. The document is loaded into a PDFDocumentProxy object using the pdfjsLib.getDocument method, ensuring correct parsing. Each page of the PDF is then iterated through using the getPage method, which returns a PDFPageProxy object for each page. The getTextContent method retrieves the text content of each page as an array of text items, with each item representing a piece of text along with its position and style information. These text items are concatenated into a single string, capturing the entire text content of the PDF. By performing these operations on the client side, the approach leverages the processing power of the user’s device, reducing server load and ensuring faster response times. The extracted text is appended to a FormData object along with the original form data and the PDF file itself, ensuring that all necessary information is sent to the server in a structured manner. The use of modern web APIs and libraries that handle binary data and complex document structures helps maintain the integrity of the extracted text. PDF.js, in particular, is known for its accuracy in rendering and extracting text from PDF documents. By combining these technologies and techniques, the approach ensures that text is extracted from PDFs with high accuracy, preserving the original content and structure as much as possible.

You can refer to my GitHub account to review the scripts implementing this approach, which utilizes HTML, CSS, JavaScript, PHP, and SQL.

SECOND PART:

To effectively evaluate resumes, they must be compared to a well-defined job description. Therefore, I will develop a template that enables the hiring manager or HR professional to input a comprehensive and detailed job description. I have designed a simple form that facilitates the entry of the following data into a database table:
Required Skills
Required Years of Experience
Required Gender of Applicant
Required Age of Applicant
Place of Work
Additional Skills
Job Description
You can refer to my GitHub account to review the scripts implementing this approach, which utilizes HTML, CSS, PHP, and SQL.


THIRD PART:

The central issue and most critical research topic is determining how to compare a CV and a job description in a fair and equitable manner.
To achieve my goal, I developed a PHP script that processes a job application system to evaluate applicants based on various criteria and calculate their suitability score. The script begins by establishing a database connection and defining two functions: one for calculating cosine similarity between two vectors and another for converting text into a word vector. Upon form submission via POST, the script retrieves job application details and applicant information from the database. It compares the applicants' CVs against job requirements, including required skills, gender, and place of work, assigning scores to each criterion. Additionally, natural language processing (NLP) with cosine similarity is used to compare the CV content with job requirements and additional skills, generating a final CV score. The applicants are then ranked based on their scores, and the results are presented in an HTML table, providing a comprehensive evaluation and ranking of each applicant.

Conclusion:
I plan to adhere to the previously outlined steps and concepts to develop the ATS, incorporating enhancements, particularly in the NLP component. Overall, I believe that following this approach will help me achieve the two primary goals:
To provide applicants with the flexibility to design and format their resumes according to their preferences.
To ensure a fair evaluation process and advise recruiters on the best candidates based on their resumes.
